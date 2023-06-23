<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
  
    public function index()
    {
        $products=Product::with('category')->orderBy('id','desc')->paginate(5);
        return view('admin.index',compact('products'));
    }
    public function create()
    {
        $categories=Category::all();
        return view('admin.create',compact('categories'));
    }
    //to store new products
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'description'=>'required',
            'discount'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product=new Product;
        $product->name=$request->input('name');
        $product->category_id=$request->input('category_id');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        $product->discount=$request->input('discount');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }
        $product->save();
        Alert::success("Product Created Successfully");

        return redirect()->route('admin.index')->with('success','Product created successfully');
    }

    public function show(Product $product)
    {
        return view('admin.show',compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.edit',compact('product'));
    }

    public function update(Request $request,Product $product)
    {
        Alert::success('Updated Successfully');
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'discount'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }
        $product->fill($request->post())->save();
        return redirect()->route('admin.index')->with('success','product updated successfully');
    }
    public function destroy($id)
    {
        $product=Product::find($id);
        if (!$product) {
            return redirect()->route('admin.index')->with('error', 'Product not found');
        }
        $product->delete();
        return redirect()->route('admin.index');
    

    }
}
