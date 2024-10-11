@extends('layouts.base')

@section('content')
<style>
    
</style>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Xác nhận thanh toán</h2>
                    <ul class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Giỏ hàng</a></li>
                        <li class="breadcrumb-item active">Xác nhận thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Thank You -->
    <div class="thank-you-box-main py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
                <div class="col-lg-8 text-center">
                    <h2 class="display-4">Cảm ơn bạn đã đặt hàng!</h2>
                    <p class="lead">Đơn hàng của bạn hiện đang được thực hiện bởi nhân viên cửa hàng.</p>
                    <p class="lead">Thông tin sẽ được cập nhật tại danh sách đơn hàng của bạn.</p>
                    <br>
                    <a href="{{ url('my-orders') }}" class="btn btn-primary btn-lg">Xem đơn hàng</a>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary btn-lg">Mua sắm tiếp</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Thank You -->
@endsection
