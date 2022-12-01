<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;
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
        $stocks = Stock::all();
        $products = DB::table('products')->where('category_id','=',$categoryId)->get();
        return view('home.products', compact('categories','products','stocks'));
    }

    public function purchase(Request $request, $productId){
        $this->validate($request,[
            'quantity' => 'required'
        ]);
        $newPurchase = new Purchase();
        $product = Product::find($productId);
        $stock = Stock::where('product_id',$productId)->get();
        $newStock = $stock[0]->stock - $request->quantity;
        $newPurchase->user_id = auth()->user()->id;
        $newPurchase->product_id = $product->id;
        $newPurchase->cant = $request->quantity;
        $newPurchase->total = $product->price * $request->quantity;
        if(!($newStock < 0)){
            $newPurchase->save();
            DB::table('stocks')->where('product_id',$productId)->update(['stock'=>$newStock]);
            return redirect()->back()->with('msg',"Producto Comprado Exitosamente");
        }else{
            return redirect()->back()->with('msg',"No hay stock suficiente");
        }
    }

    public function history(){
        $categories = Category::all();
        $purchases = Purchase::where('user_id',auth()->user()->id)->paginate(5);
        return view('home.purchases', compact('purchases','categories'));
    }

    public function search(Request $request){
        $this->validate($request,[
            'search' => 'required'
        ]);
        $products = DB::table('products')->where('name','like', '%'.$request->search.'%')->get();
        $stocks = Stock::all();
        $error = "";
        if($products->isEmpty()){
            $error = "No se han encontrado Productos...";
            return view('home.search', compact('products','stocks','error'));
        }else{
            $error = "Productos Encontrados...";
            return view('home.search', compact('products','stocks','error'));
        }
    }
}
