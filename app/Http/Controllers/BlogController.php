<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //filter by categories
        if(request()->category){
            $posts = Post::with('category')->whereHas('category', function($query){
                $query->where('slug', request()->category);
            })->paginate(4);

            $categories =  Category::all();
            $tags =  Tag::all();
            $popularPosts = Post::inRandomOrder()->take(3)->get();

        }//filter by Tags
        elseif(request()->tag)
        {
            $posts= Post::with('tags')->whereHas('tags', function($query){
                $query->where('slug', request()->tag);
            })->paginate(4);

            $categories =  Category::all();
            $tags =  Tag::all();
            $popularPosts = Post::inRandomOrder()->take(3)->get();

        }else {

            $posts =  Post::orderBy('created_at', 'desc')->latest()->paginate(4);
            $categories =  Category::all();
            $tags =  Tag::all();
            $popularPosts = Post::inRandomOrder()->take(3)->get();

        }
        return view('blog')->with([
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'popularPosts' => $popularPosts,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slu
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('post')->with([
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'popularPosts' => Post::inRandomOrder()->take(3)->get(),
            'comments' => $post->comments()->paginate(4)
        ]);
    }

    //post search
    public function search(Request  $request)
    {
        $request->validate([
            'postsearch' => 'required|min:3'
        ]);
        $postsearch = $request->input('postsearch');
        $posts = Post::search($postsearch)->paginate(10);
        
        return view('postSearch')->with([
            'posts' => $posts,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'popularPosts' => Post::inRandomOrder()->take(3)->get(),
        ]);;
    }
}
