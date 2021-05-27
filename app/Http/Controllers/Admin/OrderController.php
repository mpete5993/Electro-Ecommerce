<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.itemsList.orderList')->with([
            'orders' => Order::orderBy('created_at', 'desc')->paginate(6)
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
        $order = Order::where('id', $id)->firstOrFail();
        return view('admin.viewItem.viewOrder')->with([
            'order' => Order::find($id),
            'products' => Product::all()
            
        ]);
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
        return view('admin.updateItems.editOrder')->with([
            'order' => Order::find($id),
            
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
        $order = Order::find($id);

        if($request->shipped){
            $order->shipped = true;
        }

        if($request->unshipped){
            $order->shipped = false;
        }

        $order->save();

        toastr()->success('Item updated successfully.!');
        return redirect()->route('admin.orders.index');

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
        Order::destroy($id);
        toastr()->success('Item deleted successfully');
        return  redirect()->route('admin.orders.index');
    }
}
