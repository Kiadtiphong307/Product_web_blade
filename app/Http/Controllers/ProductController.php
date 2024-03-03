<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\North;
use App\Models\EastNorth;
use App\Models\Center;
use App\Models\East;
use App\Models\South;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function show()
    {
        $products = Product::paginate(3);
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
            'stock' => 'required',
            'image' => 'required',
            'category' => 'required',
            'region' => 'required',
        ], [
            'product_name.required' => '**กรุณากรอกชื่อสินค้า',
            'description.required' => '**กรุณากรอกรายละเอียดสินค้า',
            'price.required' => '**กรุณากรอกราคาสินค้า',
            'stock.required' => '**กรุณากรอกจำนวนสินค้า',
            'image.required' => '**กรุณาอัปโหลดรูปสินค้า',
            'category.required' => '**กรุณากรอกประเภทสินค้า',
            'region.required' => '**กรุณากรอกภูมิภาคสินค้า'
        ]);

        $region = $request->region;

        $imageFile = $request->file('image');
        $imageName = $imageFile->getClientOriginalName();
        $imagePath = $imageFile->storeAs('images', $imageName, 'public');


        $product = Product::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
            'category' => $request->category,
            'region' => $request->region,
            'created_at' => now()
        ]);


        switch ($region) {
            case 'ภาคเหนือ':
                North::create([
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'image' => $product->image,
                    'region' => $product->region,
                    'category' => $product->category,
                    'created_at' => $product->created_at
                ]);
                break;
            case 'ภาคตะวันออกเฉียงเหนือ':
                EastNorth::create([
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'image' => $product->image,
                    'region' => $product->region,
                    'category' => $product->category,
                    'created_at' => $product->created_at
                ]);
                break;
            case 'ภาคกลาง':
                Center::create([
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'image' => $product->image,
                    'region' => $product->region,
                    'category' => $product->category,
                    'created_at' => $product->created_at
                ]);
                break;
            case 'ภาคตะวันออก':
                East::create([
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'image' => $product->image,
                    'region' => $product->region,
                    'category' => $product->category,
                    'created_at' => $product->created_at
                ]);
                break;
            case 'ภาคใต้':
                South::create([
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'stock' => $product->stock,
                    'image' => $product->image,
                    'region' => $product->region,
                    'category' => $product->category,
                    'created_at' => $product->created_at
                ]);
                break;
            default:
                break;
        }

        return redirect()->route('product');
    }



    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'product_name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'image' => 'required',
                'category' => 'required',
                'region' => 'required',

            ],
            [
                'product_name.required' => '**กรุณากรอกชื่อสินค้า',
                'description.required' => '**กรุณากรอกรายละเอียดสินค้า',
                'price.required' => '**กรุณากรอกราคาสินค้า',
                'stock.required' => '**กรุณากรอกจำนวนสินค้า',
                'image.required' => '**กรุณาอัปโหลดรูปสินค้า',
                'category.required' => '**กรุณากรอกประเภทสินค้า',
                'region.required' => '**กรุณากรอกภูมิภาคสินค้า'

            ]
        );



        Product::where('id', $id)->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $request->image,
            'category' => $request->category,
            'region' => $request->region,
            'updated_at' => now()
        ]);

        return redirect()->route('product');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        return view('edit', compact('product'));
    }

    public function destroy($id)
    {
        
        Center::where('product_id', $id)->delete();
        East::where('product_id', $id)->delete();
        EastNorth::where('product_id', $id)->delete();
        North::where('product_id', $id)->delete();
        South::where('product_id', $id)->delete();



        Product::where('id', $id)->delete();
    
        return redirect()->route('product');
    }
    
    







    //CartController 
    public function addcart($id)
    {

        $product = Product::findOrfail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['stock']++;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'image' => $product->image,
                'product_name' => $product->product_name,
                'stock' => 1,
                'category' => $product->category,
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
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
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
                session()->flash('cartMessages.' . $id, [
                    'product_id' => $id,
                    'product_name' => $details['product_name'],
                    'remaining_stock' => $product ? $product->stock : 0
                ]);
            }
        }

        return $cartQuantityMatches;
    }
}
