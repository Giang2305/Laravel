@extends('layouts.base')

@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Thanh toán</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Giỏ hàng</a></li>
                        <li class="breadcrumb-item active">Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <form action="{{ route('checkout.placeOrder') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="checkout-address">
                            <div class="title-left">
                                <h3>Địa chỉ nhận hàng</h3>
                            </div>
                            <form class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">Tên *</label>
                                        <input name="firstname" type="text" class="form-control" placeholder="" value="{{ old('firstname') }}" required>
                                        @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Họ *</label>
                                        <input name="lastname" type="text" class="form-control" placeholder="" value="{{ old('lastname') }}" required>
                                        @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email *</label>
                                    <input name="email" type="email" class="form-control" placeholder="" value="{{ old('email') }}" required>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mobile">Số điện thoại *</label>
                                    <input name="mobile" type="text" class="form-control" placeholder="" value="{{ old('mobile') }}" required>
                                    @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="line1">Địa chỉ nhận *</label>
                                    <input name="line1" type="text" class="form-control" placeholder="" value="{{ old('line1') }}" required>
                                    @error('line1') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="line2">Địa chỉ phụ</label>
                                    <input name="line2" type="text" class="form-control" placeholder="" value="{{ old('line2') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="country">Quốc gia *</label>
                                    <input name="country" type="text" class="form-control" placeholder="" value="{{ old('country') }}" required>
                                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="province">Tỉnh thành *</label>
                                    <input name="province" type="text" class="form-control" placeholder="" value="{{ old('province') }}" required>
                                    @error('province') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="city">Xã / Thành phố *</label>
                                    <input name="city" type="text" class="form-control" placeholder="" value="{{ old('city') }}" required>
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="zipcode">Mã bưu điện / Zip *</label>
                                    <input name="zipcode" type="text" class="form-control" placeholder="" value="{{ old('zipcode') }}" required>
                                    @error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <hr class="mb-4">
                                <div class="title"> <span>Thanh toán bằng</span> </div>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="cod" value="cod" name="paymentmode" type="radio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="cod">Trả tiền mặt</label>
                                    </div>
                                    @error('paymentmode') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <hr class="mb-1">
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="odr-box">
                                    <div class="title-left">
                                        <h3>Giỏ hàng</h3>
                                    </div>
                                    <div class="d-flex">
                                        <div class="font-weight-bold">Sản phẩm</div>
                                    </div>
                                    <div class="rounded p-2 bg-light">
                                        
                                        @foreach(Cart::instance('cart')->content() as $item)
                                            <div class="media mb-2 border-bottom">
                                                <div class="media-body">
                                                    <a href="{{ route('shop.product.details', $item->model->slug) }}">{{ $item->name }}</a>
                                                    <div class="small text-muted">Giá tiền: ${{ $item->price }} <span class="mx-2">|</span> Số lượng: {{ $item->qty }} <span class="mx-2">|</span> Giá gốc: ${{ $item->subtotal }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-lg-12">
                                <div class="order-box">
                                    <hr>
                                    @if(Session::has('checkout'))
                                        <div class="d-flex gr-total">
                                            <h5>Tổng tiền</h5>
                                            <div class="ml-auto h5">$ {{ Session::get('checkout')['total'] }}</div>
                                        @endif
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary media-body">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Cart -->
@endsection
