<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // Here you can verify for checkout as in your Livewire component
        if (!Auth::check()) {
            return redirect()->route('login');
        } elseif (!session()->has('checkout')) {
            return redirect()->route('cart.index');
        }

        return view('checkout');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required'
        ]);

        $order = new Order();
        $order->user_id = Auth::id();
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->email = $request->email;
        $order->mobile = $request->mobile;
        $order->line1 = $request->line1;
        $order->line2 = $request->line2;
        $order->city = $request->city;
        $order->province = $request->province;
        $order->country = $request->country;
        $order->zipcode = $request->zipcode;
        $order->status = 'ordered';
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($request->paymentmode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = Auth::id();
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }

        session()->forget('checkout');
        Cart::instance('cart')->destroy();

        return redirect()->route('thankyou.index');
    }
}
