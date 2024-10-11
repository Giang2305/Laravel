@extends('layouts.base')

@section('content')
<div class="container" style="padding: 30px; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;">
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('order_message'))
                <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
            @endif
            <div class="panel panel-default" style="margin-bottom: 20px;">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 style="margin: 0;">Chi tiết đơn hàng</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('user.orders.index') }}" class="btn btn-success pull-right">Trở về danh sách</a>
                            @if($order->status == 'ordered')
                                <form action="{{ route('user.orders.cancel', $order->id) }}" method="POST" class="pull-right" style="margin-left: 10px;">
                                    @csrf
                                    @method('PATCH')
                                    <button style="margin-right: 20px" type="submit" class="btn btn-danger">Huỷ đơn hàng</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table" style="border: 1px solid #ccc;">
                        <br>
                        <tr>
                            <th style="border: 1px solid #ccc;">Mã đơn hàng</th>
                            <td style="border: 1px solid #ccc;">{{ $order->id }}</td>
                            <th style="border: 1px solid #ccc;">Ngày đặt</th>
                            <td style="border: 1px solid #ccc;">{{ $order->created_at }}</td>
                            <th style="border: 1px solid #ccc;">Trạng thái</th>
                            <td style="border: 1px solid #ccc;">{{ $order->status }}</td>
                            @if($order->status == 'delivered')
                                <th style="border: 1px solid #ccc;">Ngày nhận hàng</th>
                                <td style="border: 1px solid #ccc;">{{ $order->delivered_date }}</td>
                            @elseif($order->status == 'canceled')
                                <th style="border: 1px solid #ccc;">Ngày huỷ đơn</th>
                                <td style="border: 1px solid #ccc;">{{ $order->canceled_date }}</td>
                            @endif
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
                    <h3 style="margin: 0;">Danh sách sản phẩm</h3>
                </div>
                <div class="panel-body">
                    <div class="wrap-iten-in-cart">                                                       
                        <ul class="products-cart">
                            @foreach ($order->orderItems as $item)
                                <li class="pr-cart-item" style="border-bottom: 1px solid #ccc; padding: 10px 0;">
                                    @if ($item->product)
                                        <div class="product-image" style="margin-right: 20px;">
                                            <figure><img src="{{ asset('images/' . $item->product->image) }}" alt="{{ $item->product->name }}" style="width: 100px;"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{ route('shop.product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                                        </div>
                                    @else
                                        <div class="product-name">Không tìm thấy sản phẩm</div>
                                    @endif
                                    <div class="price-field produtc-price" style="margin-right: 20px;"><p class="price">${{ $item->price }}</p></div>
                                    <div class="quantity">
                                        <h5>{{ $item->quantity }}</h5>
                                    </div>
                                    
                                </li>
                            @endforeach                   
                        </ul>                           
                    </div>
                    <div class="summary" style="margin-top: 20px;">
                        <div class="order-summary">
                            <h4 class="title-box">Tóm tắt hoá đơn</h4>
                            <p class="summary-info"><span class="title">Giá gốc</span><b class="index">${{ $order->subtotal }}</b></p>
                            <p class="summary-info"><span class="title">Phí tax</span><b class="index">${{ $order->tax }}</b></p>
                            <p class="summary-info"><span class="title">Giá ship</span><b class="index">Miễn phí</b></p>
                            <p class="summary-info"><span class="title">Tổng tiền</span><b class="index">${{ $order->total }}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <br>
                    <h3 style="margin: 0;">Chi tiết thanh toán</h3>
                </div>
                <div class="panel-body">
                    <table class="table" style="border: 1px solid #ccc;">
                        <tr>
                            <th style="border: 1px solid #ccc;">Tên</th>
                            <td style="border: 1px solid #ccc;">{{ $order->firstname }}</td>
                            <th style="border: 1px solid #ccc;">Họ</th>
                            <td style="border: 1px solid #ccc;">{{ $order->lastname }}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #ccc;">Số điện thoại</th>
                            <td style="border: 1px solid #ccc;">{{ $order->mobile }}</td>
                            <th style="border: 1px solid #ccc;">Email</th>
                            <td style="border: 1px solid #ccc;">{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #ccc;">Địa chỉ nhận</th>
                            <td style="border: 1px solid #ccc;">{{ $order->line1 }}</td>
                            <th style="border: 1px solid #ccc;">Địa chỉ phụ</th>
                            <td style="border: 1px solid #ccc;">{{ $order->line2 }}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #ccc;">Thành phố / xã</th>
                            <td style="border: 1px solid #ccc;">{{ $order->city }}</td>
                            <th style="border: 1px solid #ccc;">Tỉnh thành</th>
                            <td style="border: 1px solid #ccc;">{{ $order->province }}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #ccc;">Quốc gia</th>
                            <td style="border: 1px solid #ccc;">{{ $order->country }}</td>
                            <th style="border: 1px solid #ccc;">Mã bưu điện</th>
                            <td style="border: 1px solid #ccc;">{{ $order->zipcode }}</td>
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
                    <h3 style="margin: 0;">Thông tin thanh toán</h3>
                </div>
                <div class="panel-body">
                    <table class="table" style="border: 1px solid #ccc;">
                        <tr>
                            <th style="border: 1px solid #ccc;">Kiểu thanh toán</th>
                            <td style="border: 1px solid #ccc;">{{ $order->transaction->mode }}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #ccc;">Trạng thái</th>
                            <td style="border: 1px solid #ccc;">{{ $order->transaction->status }}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #ccc;">Ngày thanh toán</th>
                            <td style="border: 1px solid #ccc;">{{ $order->transaction->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
