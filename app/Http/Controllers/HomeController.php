<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(4)->get();
        $RelatedProducts =  Product::inRandomOrder()->take(8)->get();
        $posts = Post::inRandomOrder()->take(3)->get();


        return view('home')->with([
            'products' => $products,
            'RelatedProduct' => $RelatedProducts,
            'posts' =>$posts
        ]);
    }
}
