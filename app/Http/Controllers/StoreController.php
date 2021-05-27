<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use willvincent\Rateable\Rateable;
use Auth;
use App\Models\User;
use App\Models\Rating;

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
        $review = Rating::all();

        return view('product')->with([
            'product' => $product,
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'popular' => Product::inRandomOrder()->take(4)->get(),
            'reviews' => $product->ratings()->paginate(4)
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
    public function review(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'rate' => 'required',
            'review' => 'required'
        ]);

        $Review = Product::find($request->id);
        
        $review = new \willvincent\Rateable\Rating;
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->review = $request->input('review');

        $review->rating = $request->rate;

        $review->user_id = '1';

        $Review->ratings()->save($review);

        //$productReview = \App\Product::where('slug',$slug)->with('rating')->paginate(3);

        return back()->with('success', 'Thank you for your review');
    }

}
