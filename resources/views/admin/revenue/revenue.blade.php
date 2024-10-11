@extends('Admin.Layout.master')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Quản lý doanh thu
                </div>
            </div>
        </div>
    </div>

    <div class="main-card mb-3 card" style="padding: 30px; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="margin-bottom: 20px;">
                    <div class="panel-heading">
                        <h3 style="margin: 0; text-align: center; margin-bottom: 20px; margin-top: 10px">Doanh thu</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table" style="border: 1px solid #ccc;">
                            <tr>
                                <th style="border: 1px solid #ccc;">Tổng đơn hàng</th>
                                <td style="border: 1px solid #ccc;">{{ $totalOrders }}</td>
                                <th style="border: 1px solid #ccc;">Tổng sản phẩm bán</th>
                                <td style="border: 1px solid #ccc;">{{ $totalItemsSold }}</td>
                                <th style="border: 1px solid #ccc;">Tổng doanh thu</th>
                                <td style="border: 1px solid #ccc;">${{ $totalRevenue }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="margin: 0; text-align: center; margin-bottom: 20px; margin-top: 10px">Sản phẩm đã bán</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table" style="border: 1px solid #ccc;">
                            <thead>
                                <tr>
                                    <th style="border: 1px solid #ccc;">Tên sản phẩm</th>
                                    <th style="border: 1px solid #ccc;">Giá</th>
                                    <th style="border: 1px solid #ccc;">Lượng bán</th>
                                    <th style="border: 1px solid #ccc;">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td style="border: 1px solid #ccc;">{{ $item->name }}</td>
                                        <td style="border: 1px solid #ccc;">${{ $item->price }}</td>
                                        <td style="border: 1px solid #ccc;">{{ $item->total_quantity }}</td>
                                        <td style="border: 1px solid #ccc;">${{ $item->total_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <h3 style="margin: 0; text-align: center; margin-bottom: 20px; margin-top: 10px">Trạng thái đơn hàng</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table" style="border: 1px solid #ccc;">
                            <tr>
                                <th style="border: 1px solid #ccc;">Đơn đã giao</th>
                                <td style="border: 1px solid #ccc;">{{ $deliveredOrders }}</td>
                                <th style="border: 1px solid #ccc;">Đơn đã đặt</th>
                                <td style="border: 1px solid #ccc;">{{ $orderedOrders }}</td>
                                <th style="border: 1px solid #ccc;">Đơn đã hủy</th>
                                <td style="border: 1px solid #ccc;">{{ $canceledOrders }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 50px;">
                    <a href="{{ route('admin.revenue.exportCsv') }}" class="btn btn-primary">Xuất file CSV</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection