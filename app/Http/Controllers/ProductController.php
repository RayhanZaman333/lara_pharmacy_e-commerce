<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Http\Request;
use Image;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest('id')->get();
        //dd($products);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin/product/' . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req) {
        // $data = $request-> validate([
        $data = $req-> validate([
            'title' => 'required|max:100',
            'category_id' => 'required',
            'brand_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',

        ]);

        $product = new Product;

        $product->title = $req->title;
        $product->category_id = $req->category_id;
        $product->brand_id = $req->brand_id;
        $product->quantity = $req->quantity;
        $product->price = $req->price;
        $product->description = $req->description;

        // $product = Product::create($data);

        if ($req -> hasFile('image')) {
            $image = $req -> file('image');
            $imgName = time() . '.' . $image -> getClientOriginalExtension();
            $location = public_path('images/products/' . $imgName);
            Image::make($image) -> save($location);

            $product->image = $imgName;
        }

        $product->save();

        Session()->flash('success' , 'Product Added Successfully !!!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = Product::find($id);

        return view('admin.product.update')->with('product' , $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req -> validate([
            'title' => 'required|max:100',
            'category_id' => 'required',
            'brand_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            // 'status' => 'required',
        ]);

        $product = Product::find($id);

        $product->title = $req->title;
        $product->category_id = $req->category_id;
        $product->brand_id = $req->brand_id;
        $product->quantity = $req->quantity;
        $product->price = $req->price;
        $product->description = $req->description;
        
        // $product->status = $req->status;

        // if ($req -> hasFile('image')) {

        //     if(File::exists('images/products/' . $product->image))
        //     {
        //         File::delete('images/products/' . $product->image);
        //     }
            
        //     $image = $req -> file('image');
        //     $imgName = time() . '.' . $image -> getClientOriginalExtension();
        //     $location = public_path('images/products/' . $imgName);
        //     Image::make($image) -> save($location);

        //     $product->image = $imgName;
        // }

        $product->save();

        Session()->flash('success' , 'Product Updated Successfully !!!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!is_null($product)) {
            $product -> delete();
        }

        Session()->flash('success' , 'Product Deleted Successfully !!!');
        return back();
    }
}
