<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orders = Order::paginate(3);
        return view('order', ['orders' => $orders]);
    }



    public function create(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => '**กรุณากรอกชื่อ-นามสกุล',
            'address.required' => '**กรุณากรอกที่อยู่',
            'phone.required' => '**กรุณาเบอร์โทรศัพท์',
            'image.required' => '**กรุณาอัปโหลดไฟล์ภาพหลักฐานการโอน',
        ]);

        // Generate order ID
        $latestOrder = Order::orderBy('id', 'desc')->first();
        $id = $latestOrder ? $latestOrder->id + 1 : 1;
        $order_id = strtoupper(chr(rand(65, 90))) . rand(1000, 9999);

        // Upload image
        $imageFile = $request->file('image');
        $imageName = $imageFile->getClientOriginalName();
        $imagePath = $imageFile->storeAs('payment', $imageName, 'public');

        // Create order details
        $productDetails = [];
        foreach (session('cart') as $id => $details) {
            $productDetails[] = [
                'product_id' => $details['id'],
                'product_name' => $details['product_name'],
                'price' => $details['price'],
                'stock' => $details['stock'],
                'total' => $details['stock'] * $details['price'],
            ];
        }

        // Create order and related order details
        foreach ($productDetails as $productDetail) {
            Order::create([
                'id' => $id,
                'order_id' => $order_id,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'image' => $imagePath,
                'product_id' => $productDetail['product_id'],
                'product_name' => $productDetail['product_name'],
                'price' => $productDetail['price'],
                'stock' => $productDetail['stock'],
                'total' => $productDetail['total'],
                'user_id' => Auth::id(),
                'created_at' => now()
            ]);

            $product = Product::findOrFail($productDetail['product_id']);
            $product->update(['stock' => $product->stock - $productDetail['stock']]);
        }


        $request->session()->forget('cart');

        return redirect()->route('user_orders');
    }
}
