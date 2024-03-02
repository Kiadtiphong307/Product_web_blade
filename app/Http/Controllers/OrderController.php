<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        $orders = Order::all();
        return view('order', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'name.required' => '**กรุณากรอกชื่อ-นามสกุล',
            'address.required' => '**กรุณากรอกที่อยู่',
            'phone.required' => '**กรุณาเบอร์โทรศัพท์',
            'image.required' => '**กรุณาอัปโหลดไฟล์ภาพหลักฐานกาารโอน',
        ]);

        $latestOrder = Order::orderBy('id', 'desc')->first();
        $id = $latestOrder ? $latestOrder->id + 1 : 1;

        $order_id = strtoupper(chr(rand(65, 90))) . rand(1000, 9999);

        $imageFile = $request->file('image');
        $imageName = $imageFile->getClientOriginalName();
        $imagePath = $imageFile->storeAs('payment', $imageName, 'public');

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
        }

        return redirect()->route('user_orders');
    }

    public function user()
    {
        $Users = User::all(); 
        return view('user', ['Users' => $Users]); 


    }

    public function userOrders()
    {
        $userId = Auth::id();
        $userOrders = Order::where('user_id', $userId)->get();
        return view('user_orders', ['userOrders' => $userOrders]);
    }

    



    
}
