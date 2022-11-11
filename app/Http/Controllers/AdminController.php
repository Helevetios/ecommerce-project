<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function categories(){
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function categoriesStore(Request $request){
        $this->validate($request,[
            'name' => 'required'
        ]);
        Category::create($request->all());
        return redirect()->back();
    }
}
