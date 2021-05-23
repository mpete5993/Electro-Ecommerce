<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use \Illuminate\Support\Str;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
                return view('admin.itemsList.brandList')->with('brands', Brand::orderBy('created_at', 'desc')->latest()->paginate(8));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addItems.addbrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $brand = Brand::create([
            'name' => $request->brand,
            'slug' => Str::slug($request->brand),
        ]);

        toastr()->success('Item Added successfully!');

        return Redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.updateItems.editBrand')->with(['brand' =>brand::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ExistingBrand = Brand::find($id); 

        $ExistingBrand->name = $request->brand;
        $ExistingBrand->save();

        toastr()->success('Item update successfully .!');

        return view('admin.itemsList.brandList')->with(['brands' => Brand::orderBy('created_at', 'desc')->latest()->paginate(8)]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Brand::destroy($id);
        toastr()->success('Item deleted successfully .!');
        
        return  redirect()->route('admin.brands.index');
    }
}
