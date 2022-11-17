<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('home.index', compact('categories'));
    }

    public function user(){
        $categories = Category::all();
        return view('home.user',compact('categories'));
    }
    
    public function products($categoryId){
        $categories = Category::all();
        $products = DB::table('products')->where('category_id','=',$categoryId)->get();
        return view('home.products', compact('categories','products'));
    }
}
