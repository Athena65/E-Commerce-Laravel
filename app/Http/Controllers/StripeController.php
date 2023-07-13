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
    public function checkout($id)
    {
       \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $product=Product::find($id);
       $session=\Stripe\Checkout\Session::create([
        'line_items'=>[
            [
                'price_data'=>[
                    'currency'=>'gbp',
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
