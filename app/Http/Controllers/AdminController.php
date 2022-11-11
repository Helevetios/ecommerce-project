<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
}
