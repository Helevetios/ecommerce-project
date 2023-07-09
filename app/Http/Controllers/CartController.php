<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $carts = Cart::where('user_id', auth()->user()->id)->paginate(5);
        return view('home.carts', compact('carts', 'categories'));
    }

    public function store(Request $request, $productId)
    {
        $this->validate($request, [
            'cant' => 'required'
        ]);
        if ($request->cant == 0) {
            return redirect()->back()->with('msg', "error");
        } else {
            $newCart = new Cart();
            $product = Product::find($productId);
            $newCart->user_id = auth()->user()->id;
            $newCart->product_id = $product->id;
            $newCart->cant = $request->cant;
            $newCart->total = $product->price * $request->cant;
            $newCart->save();
            return redirect()->back()->with('msg', "Producto Añadido");
        }
    }

    public function destroy($cartId)
    {
        Cart::destroy($cartId);
        return redirect()->back();
    }

    public function buy()
    {
        $cart = Cart::all();
        foreach ($cart as $cart) {
            $NewPurchase = new Purchase();
            $NewPurchase->user_id = $cart->user_id;
            $NewPurchase->product_id = $cart->product_id;
            $NewPurchase->cant = $cart->cant;
            $NewPurchase->total = $cart->total;
            $NewPurchase->save();
        }
        DB::delete('delete from carts');
        return redirect()->back()->with('msg', "Operacion exitosa");
    }
}
