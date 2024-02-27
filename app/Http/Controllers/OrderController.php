<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

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
    public function create(Request $request )
    {   


        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        
        [
            'name.required' => '**กรุณากรอกชื่อ-นามสกุล',
            'address.required' => '**กรุณากรอกที่อยู่',
            'phone.required' => '**กรุณาเบอร์โทรศัพท์',
            'image.required' => '**กรุณาอัปโหลดไฟล์ภาพหลักฐานกาารโอน',
            

        ],
    
        );


        $latestProduct = Order::orderBy('id', 'desc')->first();
        $id = $latestProduct ? $latestProduct->id + 1 : 1;

        $order_id = strtoupper(chr(rand(65, 90))) . rand(1000, 9999);

        $imageFile = $request->file('image');

        $imageName = $imageFile->getClientOriginalName();

        $imagePath = $imageFile->storeAs('payment', $imageName, 'public');


        

        Order::insert([
            'id' => $id,
            'order_id' => $order_id,          
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $imagePath,
            'created_at' => now()
        ]);


        return redirect()->route('order');
    }

    /**
     * Store a newly created resource in storage.
     */


}
