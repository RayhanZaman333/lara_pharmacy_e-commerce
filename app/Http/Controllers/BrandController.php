<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use File;
use Image;

class BrandController extends Controller
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
        return view('admin/brand/' . 'create');
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

        $brand = new Brand;

        $brand->name = $req->name;
        $brand->description = $req->description;

        if ($req -> hasFile('image')) {
            $image = $req -> file('image');
            $imgName = time() . '.' . $image -> getClientOriginalExtension();
            $location = public_path('images/brands/' . $imgName);
            Image::make($image) -> save($location);

            $brand->image = $imgName;
        }

        $brand->save();

        Session()->flash('success' , 'Brand Added Successfully !!!');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $brand = Brand::orderBy('id' , 'desc')->get();

        return view('admin.brand.index')->with('brand' , $brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $brand = Brand::find($id);

        return view('admin.brand.update')->with('brand' , $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req -> validate([
            'name' => 'required|max:100',
            'description' => 'required',
        ]);

        $brand = Brand::find($id);

        $brand->name = $req->name;
        $brand->description = $req->description;
        $brand->status = $req->status;

        // if ($req -> hasFile('image')) {

        //     if(File::exists('images/brands/' . $brand->image))
        //     {
        //         File::delete('images/brands/' . $brand->image);
        //     }

        //     $image = $req -> file('image');
        //     $imgName = time() . '.' . $image -> getClientOriginalExtension();
        //     $location = public_path('images/brands/' . $imgName);
        //     Image::make($image) -> save($location);

        //     $brand->image = $imgName;
        // }

        $brand->save();

        Session()->flash('success' , 'Brand Updated Successfully !!!');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        if (!is_null($brand)) {
            $brand -> delete();
        }

        Session()->flash('success' , 'Brand Deleted Successfully !!!');
        return back();
    }
}
