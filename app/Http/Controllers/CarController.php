<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index(){
        $categories = Category::all();
        $cars = Car::where('user_id',auth()->user()->id)->paginate(5);
        return view('home.cars', compact('cars','categories'));
    }

    public function store(Request $request, $productId){
        $this->validate($request,[
            'cant' => 'required'
        ]);
        $newCar = new Car();
        $product = Product::find($productId);
        $stock = Stock::where('product_id',$productId)->get();
        $newStock = $stock[0]->stock - $request->cant;
        $newCar->user_id = auth()->user()->id;
        $newCar->product_id = $product->id;
        $newCar->cant = $request->cant;
        $newCar->total = $product->price * $request->cant;
        if(!($newStock < 0)){
            $newCar->save();
            DB::table('stocks')->where('product_id',$productId)->update(['stock'=>$newStock]);
            return redirect()->back()->with('msg',"Producto Añadido Exitosamente");
        }else{
            return redirect()->back()->with('msg',"No hay stock suficiente");
        }
    }

    public function destroy($carId){
        Car::destroy($carId);
        return redirect()->back();
    }

    public function buy(){
        $cars = Car::all();
        foreach ($cars as $car) {
            $NewPurchase = new Purchase();
            $NewPurchase->user_id = $car->user_id;
            $NewPurchase->product_id = $car->product_id;
            $NewPurchase->cant = $car->cant;
            $NewPurchase->total = $car->total;
            $NewPurchase->save();
        }
        DB::delete('delete from cars');
        return redirect()->back();
    }
}
