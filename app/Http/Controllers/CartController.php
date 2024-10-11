<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class CartController extends Controller
{
    public function index(){
        $this->setAmountForCheckout();
        $cartItems = Cart::instance('cart')->content();
        return view('cart',['cartItems'=>$cartItems]);
    }

    public function addToCart(Request $request){
        $product = Product::find($request->id);
        $price = $product->price;
        Cart::instance('cart')->add($product->id, $product->name,$request->quantity,$price)->associate('App\Models\Product');
        return redirect()->back()->with('message','Success ! Item has been added successfully!');
    }

    public function updateCart(Request $request){
        Cart::instance('cart')->update($request->rowId,$request->quantity);
        return redirect()->route('cart.index');
    }
    public function removeItem(Request $request){
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');
    }

    public function clearCart(){
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index');
    }

    public function checkout() {
        if (Auth::check()) {
            return redirect('/checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout(){ 
        if(!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        }
        session()->put('checkout',[
            'discount' => 0,
            'subtotal' => Cart::instance('cart')->subtotal(),
            'tax' => Cart::instance('cart')->tax(),
            'total' => Cart::instance('cart')->total()
        ]);
    }
}
