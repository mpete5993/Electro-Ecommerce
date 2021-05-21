<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('wishlist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
        //
       //
        $item = Cart::instance('wishlist')->get($id);

        Cart::instance('wishlist')->remove($id);

        //preventing for duplicates in the cart
        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use($item){
            return $cartItem->id === $item->id;
        });

        if ($duplicates->isNotEmpty()) {
            # code...
            return redirect()->route('cart.index')->with('message', 'Item is already in your cart');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price )->associate('App\Models\Product');

        return redirect()->route('wishlist.index')->with('message', 'Item was added to your cart');
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
        Cart::instance('wishlist')->remove($id);
        return back()->with('message', 'Item was removed to your wishlist');
    }
} //

