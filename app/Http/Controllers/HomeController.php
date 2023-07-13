<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products=Product::orderBy('id','desc')->paginate(5);
        $categories = Category::all();

        $subcategories = SubCategory::all();
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        return view('home.index',compact('products','categories','subcategories'))->with('products', $products)->with('cart', $cart);
    }
    public function detail(Request $request)
    {
        $products=Product::orderBy('id','desc')->paginate(5);
        $categories = Category::all();

        $subcategories = SubCategory::all();
        $cart = session()->get('cart');
        if ($cart == null)
            $cart = [];

        return view('home.detail',compact('products','categories','subcategories'))->with('products', $products)->with('cart', $cart);
    }
    public function detailToId(Request $request,$id)
    {

            $products=Product::orderBy('id','desc')->paginate(5);
            $categories = Category::all();

            $subcategories = SubCategory::all();
            $cart = session()->get('cart');
            if ($cart == null)
                $cart = [];


            $url = 'http://127.0.0.1:8000/detail#id=' . $id;
            return view($url,compact('products','categories','subcategories'))->with('products', $products)->with('cart',$cart);


    }
    public function getSubcategories($categoryId)
{
    $category = Category::find($categoryId);

    if ($category) {
        $subcategories = $category->subcategories;
        return view('subcategories', compact('subcategories'));
    }

    return abort(404);

}

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }
    public function showCart()
    {
        // Retrieve the cart items from the session
        $cartItems = session()->get('cart', []);

        return view('cart.index', compact('cartItems'));
    }
    public function addToCart(Request $request)
    {
        session()->put('cart', $request->post('cart'));

        return response()->json([
            'status' => 'added'
        ]);
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity)
        {
         $cart=session()->get('cart');
         $cart[$request->id]["quantity"]=$request->quantity;
         session()->put('cart',$cart);
         session()->flash('success','Product added to cart');

        }
    }
    public function remove(Request $request)
    {
        if($request->id)
        {
         $cart=session()->get('cart');
        if(isset($cart[$request->id]))
        {
            unset($cart[$request->id]);
            session()->put('cart',$cart);
        }
        session()->flash('success','Product successfully deleted');

        }
    }
}
