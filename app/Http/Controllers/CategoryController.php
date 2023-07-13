<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
         $categories=Category::orderBy('id','desc')->paginate(5);
         $sub_categories=SubCategory::all();
        return view('category.index',compact('categories','sub_categories'));
    }
    public function create()
    {
        $categories=Category::all();
        return view('category.create',compact('categories'));
    }

    //to store new companies
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index');
    }
    public function show(Category $category)
    {
        return view('category.show',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }
    public function getSubCategories(Request $request)
    {
        $category_id = $request->category_id;
        $subCategories = SubCategory::where('category_id', $category_id)->get();

        return response()->json([
            'subCategories' => $subCategories
        ]);
    }
    public function getProducts(Request $request)
    {
        $category = $request->input('category');
        $subCategory = $request->input('sub_category');

        $query = Product::query();

        if ($category && $category !== 'all') {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        }

        if ($subCategory && $subCategory !== 'all') {
            $query->whereHas('subCategory', function ($query) use ($category) {
                $query->where('name', $category);
            });
        }
        $products = $query->with('category', 'subcategory')->get();
        $formattedProducts = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'category' => $product->category->name,
                'sub_category' => $product->subcategory->name,
            ];
        });

        return response()->json([
            'products' => $formattedProducts
        ]);

    }

    public function destroy($id)
    {
        $product=Category::find($id);
        if (!$product) {
            return redirect()->route('category.index')->with('error', 'Product not found');
        }
        $product->delete();
        return redirect()->route('category.index');


    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $sub_category= new SubCategory;
        $sub_category->category_id=$id;
        $sub_category->save();
        Alert::success("category Created Successfully");

        return redirect()->route('admin.index')->with('success','user created successfully');
    }
}
