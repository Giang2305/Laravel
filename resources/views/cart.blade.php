@extends('layouts.base')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Giỏ hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Sản phẩm</a></li>
                        <li class="breadcrumb-item active"> Giỏ hàng </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            @if ($cartItems->count() > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead> 
                                <tr>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng</th>
                                    <th>Tổng giá</th>
                                    <th>Xoá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}">
                                            <img src="{{asset('images')}}/{{$item->model->image}}" class="img-fluid" alt="{{$item->model->name}}" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}">
                                            {{$item->model->name}}
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>${{$item->price}}</p>
                                    </td>
                                    <td class="quantity-box">
                                        <input type="number" name="quantity" data-rowid="{{$item->rowId}}" onchange="updateQuantity(this)" value="{{$item->qty}}" class="c-input-text qty text">
                                    </td>
                                    <td class="total-pr">
                                        <p>${{$item->subtotal()}}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="javascript:void(0)" onclick="removeItemFromCart('{{$item->rowId}}')">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="javascript:void(0)" onclick="clearCart()" style="color: red; text-decoration: underline !important;">Xoá tất cả sản phẩm</a>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Thông tin giỏ hàng</h3>
                        <div class="d-flex">
                            <h4>Giá gốc</h4>
                            <div class="ml-auto font-weight-bold">${{Cart::instance('cart')->subtotal()}}</div>
                        </div>
                        <div class="d-flex">
                            <h4>Phí tax</h4>
                            <div class="ml-auto font-weight-bold">${{Cart::instance('cart')->tax()}}</div>
                        </div>
                        <div class="d-flex">
                            <h4>Tiền shipping</h4>
                            <div class="ml-auto font-weight-bold">Miễn phí</div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Tổng tiền</h5>
                            <div class="ml-auto h5">${{Cart::instance('cart')->total()}}</div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box">
                    <form action="{{ route('checkout.index') }}" method="GET" class="ml-auto">
                        <button type="submit" class="btn hvr-hover">Thanh toán</button>
                    </form>
                </div>       
            </div>
            @else
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Giỏ hàng đang trống!</h2>
                        <h5 class="mt-3">Thêm ngay thôi.</h5>
                        <a href="{{route('shop.index')}}" class="btn btn-warning mt-5">Mua ngay</a>
                    </div>
                </div>
            @endif

            
        </div>
    </div>
    <!-- End Cart -->
    <form id="updateCartQty" action="{{route('cart.update')}}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" id="rowId" name="rowId">
        <input type="hidden" id="quantity" name="quantity">
    </form>

    <form id="deleteFormCart" action="{{route('cart.remove')}}" method="POST">
        @csrf
        @method('delete')
        <input type="hidden" id="rowId_D" name="rowId">
    </form>

    <form id="clearCart" action="{{route('cart.clear')}}" method="POST">
        @csrf
        @method('delete')
    </form>
@endsection

@push('scripts')
    <script>
        function updateQuantity(qty){
            $('#rowId').val($(qty).data('rowid'));
            $('#quantity').val($(qty).val());
            $('#updateCartQty').submit();
        }

        function removeItemFromCart(rowId){
            $('#rowId_D').val(rowId);
            $('#deleteFormCart').submit();
        }

        function clearCart(){
            $('#clearCart').submit();
        }
    </script>
@endpush
