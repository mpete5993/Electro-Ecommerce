<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Category;
use  App\Models\Brand;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.itemsList.productList')->with([
            'products'  => Product::orderBy('created_at', 'desc')->latest()->paginate(6),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addItems.addproduct')->with([
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //image upload
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('Images/products', $image_new_name);

        $product = new Product;
        $product->product_name = $request->name;
        $product->current_price = $request->price;
        $product->previous_price = $request->old_price;
        $product->details = $request->details;
        $product->brand_id = $request->brand;
        $product->slug = Str::slug($request->name);
        $product->Description = $request->description;
        
        $product->image = 'Images/products/'. $image_new_name;

        if($request->instock){
            $product->status = true;
        }
        

        $product->save();
        $product->category()->attach($request->categories);

        //dd($request->all());
        toastr()->success('Item Added successfully!');

        return redirect()->route('admin.products.index')->with([
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'products'  => Product::orderBy('created_at', 'desc')->latest()->paginate(6),
        ]);
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
        return view('admin.updateItems.editProduct')->with([
            'product' => Product::find($id),
            'categories'=> Category::all(),
            'brands'=> Brand::all(),
        ]);
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
        $product = Product::find($id);

        if ($request->hasFile('image')) {
            # code...
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('Images/products', $image_new_name);

            $product->image = 'Images/products/'.$image_new_name;
        }

        if ($request->brand) {
            # code...
            $post->brand_id = $request->brand;
        }
        if($request->instock){
            $product->status = false;
        }

        $product->product_name = $request->name;
        $product->current_price = $request->price;
        $product->previous_price = $request->old_price;
        $product->details = $request->details;
        $product->Description = $request->description;

        $product->category()->sync($request->categories);

        $product->save();

        toastr()->success('Item updated successfully.!');
        return redirect()->route('admin.products.index');
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
        Product::destroy($id);
        toastr()->success('Item deleted successfully .!');
        return  redirect()->route('admin.products.index');
    }
}
