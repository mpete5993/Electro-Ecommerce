<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class WelcomeController extends Controller
{
    //
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
