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
        return view('order');      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request )
    {   


        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ],
        
        [
            'name.required' => '**กรุณากรอกชื่อ-นามสกุล',
            'address.required' => '**กรุณากรอกที่อยู่',
            'phone.required' => '**กรุณาเบอร์โทรศัพท์'

        ],
    
        );


        $latestProduct = Order::orderBy('id', 'desc')->first();
        $id = $latestProduct ? $latestProduct->id + 1 : 1;

        $order_id = Str::upper(Str::random(1)) . rand(1000, 9999);
        

        Order::insert([
            'id' => $id,
            'order_id' => $order_id,          
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'created_at' => now()
        ]);


        return redirect()->route('payment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function payment()
    {

        return view('payment');
    }



}
