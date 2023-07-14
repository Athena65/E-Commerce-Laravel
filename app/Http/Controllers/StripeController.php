<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class StripeController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }
    public function checkout($subtotal)
    {
       \Stripe\Stripe::setApiKey(config('stripe.sk'));
       $session=\Stripe\Checkout\Session::create([
        'line_items'=>[
            [
                'price_data'=>[
                    'currency'=>'usd',
                    'product_data'=>[
                        'name'=>'Money',

                    ],
                    'unit_amount'=>$subtotal*100,
                ],
                'quantity'=>1,
            ],
        ],
        'mode'=>'payment',
        'success_url'=>route('cart.index'),
        'cancel_url'=>route('cart.index'),
    ]);


    return redirect()->away($session->url);
    }
    public function checkoutOne($subtotal)
    {
       \Stripe\Stripe::setApiKey(config('stripe.sk'));
       $product=Product::find($subtotal);
       $session=\Stripe\Checkout\Session::create([
        'line_items'=>[
            [
                'price_data'=>[
                    'currency'=>'usd',
                    'product_data'=>[
                        'name'=>'Money',

                    ],
                    'unit_amount'=>($product->total)*100,
                ],
                'quantity'=>1,
            ],
        ],
        'mode'=>'payment',
        'success_url'=>route('cart.index'),
        'cancel_url'=>route('cart.index'),
    ]);


    return redirect()->away($session->url);
    }

    public function success()
    {
        return view('cart.index');
    }
}
