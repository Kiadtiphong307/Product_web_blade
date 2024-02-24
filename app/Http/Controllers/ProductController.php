<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = DB::table('products')->get();

        return view('product', compact('products'));


        // return response()->json([
        //     'message' => 'รายการสินค้าทั้งหมด',
        //     'data' => $products
        // ], 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock'=>'required'
        ],
        
        [
            'product_name.required' => '**กรุณากรอกชื่อสินค้า',
            'description.required' => '**กรุณากรอกรายละเอียดสินค้า',
            'price.required' => '**กรุณากรอกราคาสินค้า',
            'stock.required' => '**กรุณากรอกจำนวนสินค้า'

        ]
    
        );

        $product_id = uniqid();

        DB::table('products')->insert([
            'product_id' => $product_id,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'created_at' => now()
        ]);

        
        return redirect()->route('product');


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product_id)
    {
        $product = DB::table('products')->where('product_id', $product_id)->first();
    
        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product_id)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock'=>'required'
        ],
        
        [
            'product_name.required' => '**กรุณากรอกชื่อสินค้า',
            'description.required' => '**กรุณากรอกรายละเอียดสินค้า',
            'price.required' => '**กรุณากรอกราคาสินค้า',
            'stock.required' => '**กรุณากรอกจำนวนสินค้า'
        ]
        );
    
        DB::table('products')->where('product_id', $product_id)->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'updated_at' => now()
        ]);
    
        return redirect()->route('product');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id)
    {
        DB::table('products')->where('product_id', $product_id)->delete();
    }
}
