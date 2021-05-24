<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Stripe;
use Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Mail\OrderPlaced;
use Session;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $content = Cart::content()->map(function($item){
            return $item->model->slug.',' .$item->qty;
        })->values()->toJson();
        
        try {
           //checkout with strippe
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => Cart::total() * 100,
                    "currency" => "ZAR",
                    "source" => $request->stripeToken,
                    'receipt_email' => $request->email,
                    "description" => "This payment is tested purpose lara-ecommerce.dev",
                    
                    'metadata' => [
                        'contents' => $content,
                        'quantity' => Cart::instance('default')->count(),
                    ],
            ]);
             //insert into Orders table
             $order = Order::create([
                'user_id' => auth()->user() ? auth()->user()->id : null,
                'billing_name' => $request->name,
                'billing_email' => $request->email,
                'billing_address' => $request->address,
                'billing_province' => $request->province,
                'billing_city' => $request->city,
                'billing_country' => $request->country,
                'billing_zip' => $request->zipCode,
                'billing_phone' => $request->tel,
                'name_on_card' => $request->cardOwner,
                'order_notes' =>$request->order_notes,
                'billing_subtotal' => Cart::subtotal(),
                'billing_tax' =>Cart::tax(),
                'billing_total'=> Cart::total(),
                'error' => null,
            ]);
            //insert into order_product table
            foreach(Cart::content() as $item){
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id'=>$item->model->id,
                    'quantity' => $item->qty
                ]);
            }
                
            Cart::instance('default')->destroy();
            return back()->with('success', 'Payment successful');

        } catch (\Stripe\Exception\CardException  $e) {
           
            return back()->with('error', 'Sorry, your payment was not successful. Please re-check your credentials!');

        }
   
        Session::flash('success', 'Payment successful!');
           
        return back();
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
    }

    // try {
    //     // Use Stripe's library to make requests...
    //   } catch(\Stripe\Exception\CardException $e) {
    //     // Since it's a decline, \Stripe\Exception\CardException will be caught
    //     echo 'Status is:' . $e->getHttpStatus() . '\n';
    //     echo 'Type is:' . $e->getError()->type . '\n';
    //     echo 'Code is:' . $e->getError()->code . '\n';
    //     // param is '' in this case
    //     echo 'Param is:' . $e->getError()->param . '\n';
    //     echo 'Message is:' . $e->getError()->message . '\n';
    //   } catch (\Stripe\Exception\RateLimitException $e) {
    //     // Too many requests made to the API too quickly
    //   } catch (\Stripe\Exception\InvalidRequestException $e) {
    //     // Invalid parameters were supplied to Stripe's API
    //   } catch (\Stripe\Exception\AuthenticationException $e) {
    //     // Authentication with Stripe's API failed
    //     // (maybe you changed API keys recently)
    //   } catch (\Stripe\Exception\ApiConnectionException $e) {
    //     // Network communication with Stripe failed
    //   } catch (\Stripe\Exception\ApiErrorException $e) {
    //     // Display a very generic error to the user, and maybe send
    //     // yourself an email
    //   } catch (Exception $e) {
    //     // Something else happened, completely unrelated to Stripe
    //   }
}
