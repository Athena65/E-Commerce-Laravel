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
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "id"=>$product->id,
                "name" => $product->name,
                "image" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function buyComponent()
    {
        $categories=Category::all();
        $subcategories=Category::all();
        return view('cart.index',compact('categories','subcategories'));
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
