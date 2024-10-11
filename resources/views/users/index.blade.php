@extends('layouts.base')
@section('content')
        <!-- Start All Title Box -->
        <div class="all-title-box">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Tài khoản</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('app.index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Tài khoản</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End All Title Box -->
    
        <!-- Start My Account  -->
        <div class="my-account-box-main">
            <div class="container">
                <div class="my-account-page">
                    <div class="row">
                        <div class="col">
                            <div class="account-box">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <a href="{{ url('my-orders') }}"> <i class="fa fa-gift"></i> </a>
                                    </div>
                                    <div class="service-desc">
                                        <h4>Xem đơn hàng</h4>
                                        <p>Xem chi tiết và trạng thái đơn hàng tại đây</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="account-box">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <a href="{{ url('account') }}"><i class="fa fa-lock"></i> </a>
                                    </div>
                                    <div class="service-desc">
                                        <h4>Thông tin tài khoản</h4>
                                        <p>Đổi thông tin tài khoản tại đây</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End My Account -->
    
@endsection
