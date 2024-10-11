<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function show_order()
    {
        $all_order = DB::table('orders')->get();
                  
        return view('admin.orders.show_order', compact('all_order'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function all_order()
    {
        $all_order = DB::table('orders')->get();
       
        return view('admin.order.show_order', compact('all_order'));
    }
    /**
     * Display the specified resource.
     */
   
     public function show_edit_order($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        if (!$order) {
            return redirect()->route('all_order')->with('error', 'Order not found.');
        }

        $orderItems = OrderItem::where('order_id', $id)->with('product')->get();

        return view('admin.order.edit_order', compact('order', 'orderItems'));
    }

    public function edit_order(Request $request, $orderId)
    {
        $data = [
             // Assuming 'firstname' is the correct column name in the orders table
            'status' => $request->status,
            // Add other fields if necessary
        ];

        DB::table('orders')->where('id', $orderId)->update($data);

        return redirect()->route('all_order')->with('success', 'Order edited successfully.');
    }

 
     public function delete_order($orderId)
     {
         DB::table('orders')->where('id', $orderId)->delete();
 
         return redirect()->route('all_order')->with('success', 'Order deleted successfully.');
     }
 

}
