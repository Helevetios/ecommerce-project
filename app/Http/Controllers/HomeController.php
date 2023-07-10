<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $topSellers = Purchase::select('product_id', DB::raw('SUM(cant) as total_ventas'))->groupBy('product_id')->orderByDesc('total_ventas')->limit(4)->get();
        return view('home.index', compact('categories', 'topSellers'));
    }

    public function user()
    {
        $categories = Category::all();
        return view('home.user', compact('categories'));
    }

    public function products($categoryId)
    {
        $categories = Category::all();
        $category_name = Category::where('id', $categoryId)->get();
        $products = DB::table('products')->where('category_id', '=', $categoryId)->paginate(24);
        return view('home.products', compact('categories', 'products', 'category_name'));
    }

    public function purchase(Request $request, $productId)
    {
        $this->validate($request, [
            'quantity' => 'required'
        ]);
        $newPurchase = new Purchase();
        $product = Product::find($productId);
        $stock = Stock::where('product_id', $productId)->get();
        $newStock = $stock[0]->stock - $request->quantity;
        $newPurchase->user_id = auth()->user()->id;
        $newPurchase->product_id = $product->id;
        $newPurchase->cant = $request->quantity;
        $newPurchase->total = $product->price * $request->quantity;
        if (!($newStock < 0)) {
            $newPurchase->save();
            DB::table('stocks')->where('product_id', $productId)->update(['stock' => $newStock]);
            return redirect()->back()->with('msg', "Producto Comprado Exitosamente");
        } else {
            return redirect()->back()->with('msg', "No hay stock suficiente");
        }
    }

    public function history()
    {
        $categories = Category::all();
        $purchases = Purchase::where('user_id', auth()->user()->id)->paginate(5);
        return view('home.purchases', compact('purchases', 'categories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $this->validate($request, [
            'search' => 'required'
        ]);
        $products = DB::table('products')->where('name', 'like', '%' . $request->search . '%')->get();
        $stocks = Stock::all();
        $error = "";
        if ($products->isEmpty()) {
            $error = "No se han encontrado Productos...";
            return view('home.search', compact('products', 'stocks', 'error', 'categories'));
        } else {
            $error = "Productos Encontrados...";
            return view('home.search', compact('products', 'stocks', 'error', 'categories'));
        }
    }

    public function viewProduct($id)
    {
        $productItem = Product::find($id);
        $productRelateds = DB::table('products')->where('id', '!=', $productItem->id)->take(4)->get();
        $categories = Category::all();
        $cart = Cart::where('product_id', $productItem->id)->get();
        $cartShow = false;
        if (Auth::check() && !empty($cart[0])) {
            if ($cart[0]->user_id == auth()->user()->id) {
                $cartShow = true;
            }
        }
        return view('home.viewProduct', compact('productItem', 'productRelateds', 'categories', 'cartShow'));
    }

    public function updateCart(Request $request, $id)
    {
        $this->validate($request, [
            'cant' => 'required'
        ]);

        if ($request->cant == 0) {
            return redirect()->back();
        } else {
            $cartUpdate = Cart::find($id);
            $cartUpdate->cant = $request->cant;
            $cartUpdate->total = $cartUpdate->product->price * $request->cant;
            $cartUpdate->save();
            return redirect()->back();
        }
    }
}
