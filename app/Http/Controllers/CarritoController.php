<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Cart;

class CarritoController extends Controller
{
    public function showCarrito()
    {
        return view('carrito-vista.list-product');
    }

	// public function getUser(User $user)
	// {
	// 	return view('carrito-vista.list-product', compact('user'));
	// 	// dd($user);
	// }
	// public function add(Request $request){

	// 	Cart::add(
	// 		$product->products_id,
    //         $product->user_id,
    //         1,
    //         // array("urlfoto"=>$product->urlfoto)

    //     );

    // }

	// public function addProduct(Request $request)
	// {
	// 	$product = Product::find($request->product_id);
	// 	Cart::add($request->getPort());
	// 	return back()->with('success',"$product->Title ¡se ha agregado con éxito al carrito!");

	// }

    // public function cart(){
    //     return view('checkout');
    // }

    // public function removeitem(Request $request) {
    //     //$producto = Producto::where('id', $request->id)->firstOrFail();
    //     Cart::remove([
    //     'id' => $request->id,
    //     ]);
    //     return back()->with('success',"Producto eliminado con éxito de su carrito.");
    // }

    // public function clear(){
    //     Cart::clear();
    //     return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    // }

}
