<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart = Cart::instance('default')->content();

        return view('cart')->with([
            'cart' => $cart
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
        
        //preventing for duplicates in the cart
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicates->isNotEmpty()) {
            # code...
            return redirect()->back()->with('message', 'Item is already in your cart');
        }
        Cart::add($request->id, $request->name,$request->qty, $request->price)->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('message', 'Item was added to your cart');
    }


    public function incr($id, $qty)
    {
        //
        Cart::update($id, $qty + 1);
        return redirect()->back()->with('message', 'Item was updated successfully');
    }


    public function decr($id, $qty)
    {
        //
        Cart::update($id, $qty - 1);
        return redirect()->back()->with('message', 'Item was updated successfully');
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
        Cart::remove($id);
        return redirect()->route('cart.index')->with('message', 'Item was removed to your cart');
    }

    //wishlist
    public function wishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        //prevvnting for duplicates in the cart
        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($item) {
            return $cartItem->id === $item->id;
        });

        if ($duplicates->isNotEmpty()) {
            # code...
            // Cart::add($item->id, $item->name, 1, $item->price )->associate('App\Product');

            return redirect()->route('cart.index')->with('message', 'Item is already in your wishlist');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('message', 'Item was added to your wishlist');

    }
}
