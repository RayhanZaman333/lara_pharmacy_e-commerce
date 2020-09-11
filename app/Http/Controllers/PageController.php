<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Brand;
use App\Product;

class PageController extends Controller
{
    public function index() {
    	$category = Category::orderBy('id' , 'asc')->get();
        $brand = Brand::orderBy('id' , 'asc')->get();
    	$product = Product::orderBy('id' , 'asc')->get();

        return view('index')->with(compact('category' , 'brand', 'product'));
	}

	public function category() {
		$products = Product::latest('id')->get();

	    return view('pages.category' , compact('products'));
	}

    public function categorywise_show($id) {
        // $products = Product::latest('id')->get();
        $category = Category::find($id);
        $products = Product::where('category_id', $category->id)->get();
        
            return view('pages.categorywise' ,  compact('products', 'category'));
        
    }

    public function brandwise_show($id) {
        // $products = Product::latest('id')->get();
        $brand = Brand::find($id);
        $products = Product::where('brand_id', $brand->id)->get();
        
            return view('pages.brandwise' ,  compact('products', 'brand'));
        
    }

	public function single() {
	    return view('pages/' . 'single');
	}

	public function contact() {
	    return view('pages/' . 'contact');
	}

	public function single_show($id)
    {
        $product = Product::where('id' , $id)->first();
        // dd($product);
         // return view('pages.single', compact('product'));
        if (!is_null($product)) {
           return view('pages.single', compact('product'));
        }
        else
        {
            return redirect()->route('category');
        }
    }

    public function search(Request $req) {
        $search = $req->search;

        $products = Product::orWhere('title' , 'like' , '%' . $search . '%')
        ->orWhere('price' , 'like' , '%' . $search . '%')
        ->orWhere('quantity' , 'like' , '%' . $search . '%')
        ->paginate(8);

        $categories = Category::orWhere('name' , 'like' , '%' . $search . '%')
        ->paginate(8);

        $brands = Brand::orWhere('name' , 'like' , '%' . $search . '%')
        ->paginate(8);

        return view('pages.search' , compact('search' , 'products' , 'categories' , 'brands'));
    }
}
