<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function revenue()
    {
        // Excluding canceled orders from the calculations
        $totalOrders = Order::where('status', '!=', 'canceled')->count();
        $totalItemsSold = OrderItem::whereHas('order', function ($query) {
            $query->where('status', '!=', 'canceled');
        })->sum('quantity');
        $totalRevenue = Order::where('status', '!=', 'canceled')->sum('total');

        $items = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', '!=', 'canceled')
            ->select(
                'products.name', 
                'products.price', 
                DB::raw('SUM(order_items.quantity) as total_quantity'), 
                DB::raw('SUM(order_items.price * order_items.quantity) as total_price')
            )
            ->groupBy('products.id', 'products.name', 'products.price')
            ->get();

        $deliveredOrders = Order::where('status', 'delivered')->count();
        $orderedOrders = Order::where('status', 'ordered')->count();
        $canceledOrders = Order::where('status', 'canceled')->count();

        return view('admin.revenue.revenue', compact('totalOrders', 'totalItemsSold', 'totalRevenue', 'items', 'deliveredOrders', 'orderedOrders', 'canceledOrders'));
    }

    public function exportCsv()
    {
        $fileName = 'revenue.csv';
        $orders = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', '!=', 'canceled')
            ->select(
                'products.name', 
                'products.price', 
                DB::raw('SUM(order_items.quantity) as total_quantity'), 
                DB::raw('SUM(order_items.price * order_items.quantity) as total_price')
            )
            ->groupBy('products.id', 'products.name', 'products.price')
            ->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Tên sản phẩm', 'Giá', 'Lượng bán', 'Tổng tiền'];

        $callback = function() use($orders, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($orders as $order) {
                $row = [
                    'Tên sản phẩm' => $order->name,
                    'Giá' => $order->price,
                    'Lượng bán' => $order->total_quantity,
                    'Tổng tiền' => $order->total_price
                ];

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}