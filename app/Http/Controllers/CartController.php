<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;

use App\Models\Product;


class CartController extends Controller
{
       public function index()
    {
        $products=Product::all();
        $categories = Category::all();

        $subcategories = SubCategory::all();
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        return view('cart.index',compact('products','categories','subcategories'));
    }
    public function cart()
    {
        return view('cart');
    }
    public function buyComponent($id)
    {
        $product=Product::find($id);
        $categories = Category::all();

        $subcategories = SubCategory::all();
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        return view('cart.index',compact('product','categories','subcategories'));
    }
    public function increaseItem($id)
    {
        $product=Product::findOrFail($id);
        $product->quantity+=1;
        $product->total=($product->quantity)*($product->discount);
        $product->save();
        return back();
    }
    public function decraseItem($id)
    {
        $product=Product::findOrFail($id);
        if($product->quantity>0)
        {
            $product->quantity -=1;
            $product->total=($product->quantity)*($product->discount);
            $product->save();
            return back();
        }
        else{
            return back()->with('fail','There is no product in basket');
        }
    }

}
