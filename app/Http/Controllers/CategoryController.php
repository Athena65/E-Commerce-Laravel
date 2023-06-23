<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function create()
    {
        $categories=Category::all();
        return view('category.create',compact('categories'));
    }
    //to store new companies
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
        ]);
        $category=new Category();
        $category->name=$request->input('name');
        
        $category->save();
        Alert::success("category Created Successfully");

        return redirect()->route('admin.index')->with('success','user created successfully');
    }
}
