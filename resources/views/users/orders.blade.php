@extends('layouts.base')

@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 style="font-size: 32px;">Lịch sử đơn hàng</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">Tài khoản</a></li>
                    <li class="breadcrumb-item active">Lịch sử đơn hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<div class="container"> <!-- Removed padding -->
    <div class="row">
        <div>
            <div class="panel panel-default" style="border: 4px solid #ccc; margin: 40px 0;"> <!-- Converted padding to margin -->
                <div class="panel-heading text-center" style="font-size: 24px;">
                    Hoá đơn của bạn
                </div>
                <div class="panel-body" style="padding: 20px;">
                    <div class="table-responsive">
                        <table class="table table-striped" style="border: 3px solid #ccc;">
                            <thead>
                                <tr>
                                    <th>Mã hoá đơn</th>
                                    <th>Giá gốc</th>
                                    <th>Phí tax</th>
                                    <th>Tổng tiền</th>
                                    <th>Tên</th>
                                    <th>Họ</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Mã bưu điện</th>
                                    <th>Trang thái</th>
                                    <th>Ngày đặt</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($orders as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>${{$item->subtotal}}</td>
                                        <td>${{$item->tax}}</td>
                                        <td>${{$item->total}}</td>
                                        <td>{{$item->firstname}}</td>
                                        <td>{{$item->lastname}}</td>
                                        <td>{{$item->mobile}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->zipcode}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td><a href="{{url('orderdetail/'.$item->id)}}" class="btn btn-info btn-sm">Chi tiết</a></td>
                                    </tr>
                                    @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
