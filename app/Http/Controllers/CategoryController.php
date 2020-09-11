<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin/category/' . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req) {
        $req -> validate([
            'name' => 'required|max:100',
            'description' => 'required',

        ]);

        $category = new Category;

        $category->name = $req->name;
        $category->description = $req->description;

        if ($req -> hasFile('image')) {
            $image = $req -> file('image');
            $imgName = time() . '.' . $image -> getClientOriginalExtension();
            $location = public_path('images/categories/' . $imgName);
            Image::make($image) -> save($location);

            $category->image = $imgName;
        }

        $category->save();

        Session()->flash('success' , 'Category Added Successfully !!!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $category = Category::orderBy('id' , 'desc')->get();

        return view('admin.category.index')->with('category' , $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $category = Category::find($id);

        return view('admin.category.update')->with('category' , $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req -> validate([
            'name' => 'required|max:100',
            'description' => 'required',
        ]);

        $category = Category::find($id);

        $category->name = $req->name;
        $category->description = $req->description;

        // if ($req -> hasFile('image')) {

        //     if(File::exists('images/categories/' . $category->image))
        //     {
        //         File::delete('images/categories/' . $category->image);
        //     }
            
        //     $image = $req -> file('image');
        //     $imgName = time() . '.' . $image -> getClientOriginalExtension();
        //     $location = public_path('images/categories/' . $imgName);
        //     Image::make($image) -> save($location);

        //     $category->image = $imgName;
        // }

        $category->save();

        Session()->flash('success' , 'Category Updated Successfully !!!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!is_null($category)) {
            $category -> delete();
        }

        Session()->flash('success' , 'Category Deleted Successfully !!!');
        return back();
    }
}
