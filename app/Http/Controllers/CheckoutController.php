<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Stripe;
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
        
        try {
            //code...
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
                    "amount" => Cart::total() * 100,
                    "currency" => "ZAR",
                    "source" => $request->stripeToken,
                    'receipt_email' => $request->email,
                    "description" => "This payment is tested purpose lara-ecommerce.dev",
                    
                    'metadata' => [
                        // 'contents' => $content,
                        // 'quantity' => Cart::instance('default')->count(),
                    ],
            ]);
                
            Cart::instance('default')->destroy();
            return back()->with('success', 'Payment successful');

        } catch (\Stripe\Exception\CardException  $e) {
           
            return back()->with('error', 'Sorry, your Payment was not unsuccessful. Please re-check your credentials!');

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
