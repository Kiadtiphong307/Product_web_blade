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


    public function show()
    {
        $products = Product::paginate(6);
        return view('show', compact('products'));
    }

    
    public function index()
    {

        $products = Product::paginate(3);
        return view('product', compact('products'));

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
            'stock'=>'required',
            'image' => 'required',
        ],
        
        [
            'product_name.required' => '**กรุณากรอกชื่อสินค้า',
            'description.required' => '**กรุณากรอกรายละเอียดสินค้า',
            'price.required' => '**กรุณากรอกราคาสินค้า',
            'stock.required' => '**กรุณากรอกจำนวนสินค้า',
            'image.required' => '**กรุณาอัปโหลดรูปสินค้า'

        ],
    
        );


        $latestProduct = Product::orderBy('id', 'desc')->first();
        $id = $latestProduct ? $latestProduct->id + 1 : 1;


        $imageFile = $request->file('image');

        $imageName = $imageFile->getClientOriginalName();

        $imagePath = $imageFile->storeAs('images', $imageName, 'public');


        Product::insert([
            'id' => $id,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'created_at' => now()
        ]);

        
        return redirect()->route('product');


    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
    
        return view('show', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock'=>'required',
        ],
        
        [
            'product_name.required' => '**กรุณากรอกชื่อสินค้า',
            'description.required' => '**กรุณากรอกรายละเอียดสินค้า',
            'price.required' => '**กรุณากรอกราคาสินค้า',
            'stock.required' => '**กรุณากรอกจำนวนสินค้า',

        ]
        );
    
        Product::where('id', $id)->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'updated_at' => now()
        ]);
    
        return redirect()->route('product');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();

        return redirect()->route('product');
    }


    //CartController 
    public function addcart($id)
    {

        $product = Product::findOrfail($id);
        $cart = session()->get('cart', [] );

        if (isset($cart[$id])) {
            $cart[$id]['stock']++;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'image' => $product->image,
                'product_name' => $product->product_name,
                'stock' => 1,
                'description' => $product->description,
                'price' => $product->price,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart');
    }
    
    
    

    public function cart()
    {
        $cart = session()->get('cart');

        if ($cart !== null) {
            $cartQuantityMatches = $this->checkCartQuantity();
            return view('cart', compact('cart', 'cartQuantityMatches'));
        } else {
            return redirect()->route('home');
        }
    }
    

    public function deletecart($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            unset($cart[$id]);
        }
        session()->put('cart',$cart);
        return redirect()->route('cart');
    }
    
    public function updatecart(Request $request)
    {
        $id = $request->id;
        $stock = $request->stock;
    
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['stock'] = $stock;
        }
        session()->put('cart', $cart);
    
        return redirect()->route('cart');
    }
    
    
    public function checkCartQuantity()
    {
        $cart = session()->get('cart');
        $cartQuantityMatches = true; 
    
        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            
            if (!$product || $details['stock'] > $product->stock) {
                $cartQuantityMatches = false; 

                session()->flash('cartQuantityMatches', false);
                session()->flash('cartMessages.'.$id, [
                    'product_id' => $id,
                    'product_name' => $details['product_name'],
                    'remaining_stock' => $product ? $product->stock : 0 
                ]);
            }
        }
    
        return $cartQuantityMatches;
    }






}
