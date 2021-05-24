<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //filter by categories
        if(request()->category){
            $products = Product::with('category')->whereHas('category', function($query){
                $query->where('slug', request()->category);
            })->paginate(9);

            $categories =  Category::all();
            $brands =  Brand::all();
            $top_selling = Product::inRandomOrder()->take(4)->get();
            $categoryName = $categories->where('slug', request()->category)->first()->name;
           

        }//filter by Brands
        elseif(request()->brand){
            $products = Product::with('brand')->whereHas('brand', function($query){
                $query->where('slug', request()->brand);
            })->paginate(9);

            $categories =  Category::all();
            $brands =  Brand::all();
            $top_selling = Product::inRandomOrder()->take(4)->get();
            
            $categoryName = $brands->where('slug', request()->brand)->first()->name;

        }
        else{
            
            $products = Product::orderBy('created_at' , 'desc')->paginate(9);
            $categories =  Category::all();
            $brands =  Brand::all();
            $top_selling = Product::inRandomOrder()->take(4)->get();
            $categoryName  = 'Featured';
        }


        return view('store')->with([
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'top_selling' => $top_selling,
            'categoryName' => $categoryName
        ]);

        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product')->with([
            'product' => $product,
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'popular' => Product::inRandomOrder()->take(4)->get()
        ]);
    }

    public function search(Request  $request)
    {
        // $request->validate([
        //     'search' => 'required|min:3'
        // ]);
        $search = $request->input('search');
        $products= Product::where('product_name', 'like', "%$search%")->paginate(5);

       // $products = Product::search($search)->paginate(10);
        
        return view('search')->with([
            'products' => $products,
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'top_selling' => Product::inRandomOrder()->take(4)->get()
        ]);;
    }

}
