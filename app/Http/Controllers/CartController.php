<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;

use App\Models\Product;
use Illuminate\Http\Request;


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
    public function buyOneComponent($id)
    {
        $categories=Category::all();
        $subcategories=Category::all();
        $product=Product::find($id);
        return view('cart.shopdetail',compact('categories','subcategories','product'));
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
    public function remove(Request $request)
    {

        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                session()->flash('success', 'Product removed successfully');
            }

        }
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }


}
