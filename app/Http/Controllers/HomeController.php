<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products=Product::orderBy('id','desc')->paginate(5);
        return view('home.index',compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }
}
