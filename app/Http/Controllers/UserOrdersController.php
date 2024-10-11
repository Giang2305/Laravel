<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserOrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->paginate(10);
        return view('users.orders', compact('orders'));
    }

    public function view($id)
    {
        $order = Order::with('orderItems.product')->where('id', $id)->where('user_id', Auth::id())->first();
        return view('users.view', compact('order'));
    }

    public function cancelOrder($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $order->status = "canceled";
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        
        return redirect()->route('user.orders.index')->with('order_message', 'Order has been canceled');
    }
}