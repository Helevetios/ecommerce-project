<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        return view('admin.categories.index');
    }

    public function categories(){
        $categories = Category::all();
        return view('admin.categories.categories', compact('categories'));
    }

    public function categoriesStore(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        Category::create($request->all());
        return redirect()->back();
    }

    public function categoriesUpdate(Request $request, $categoryId){
        $category = Category::find($categoryId);
        $category->name = $request->name;
        $category->save();
        return redirect()->back();
    }

    public function categoriesDelete($categoryId){
        $category = Category::find($categoryId);
        $category->delete();
        return redirect()->back();
    }

    public function productsIndex(){
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.products',[
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function productsStore(Request $request){
        $newProduct = new Product();
        $this->validate($request,[
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $newProduct->name = $request->name;
        $newProduct->category_id = $request->category_id;
        $newProduct->image = $request->file('image')->store('uploads','public');
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        
        $newProduct->save();
        return redirect()->back();
    }

    public function productsDelete($productId){
        $product_delete = Product::find($productId);
        if(Storage::delete('public/'.$product_delete->image)){
            Product::destroy($productId);
        }
        return redirect()->back();
    }
}
