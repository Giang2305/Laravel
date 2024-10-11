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
                    Sửa đơn hàng
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form method="post" action="{{ route('edit_order', ['id' => $order->id]) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $order->id }}">

                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Tên người đặt</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="name" id="name" placeholder="Name" type="text" class="form-control" value="{{ $order->firstname }}" readonly>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="products" class="col-md-2 text-md-right col-form-label">Sản phẩm / Số lượng</label>
                            <div class="col-md-9 col-xl-9" style="display: flex; align-items: center;">
                                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; justify-content: center; height: 100%;">
                                    @foreach($orderItems as $item)
                                        <li>|{{ $item->product->name }} {{ $item->quantity }}|</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="slug" class="col-md-2 text-md-right col-form-label">Tổng tiền</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="slug" id="slug" placeholder="Slug" type="text" class="form-control"  value="{{ $order->total}}" readonly>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="created_by" class="col-md-2 text-md-right col-form-label">Ngày đặt</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="created_by" id="created_by" placeholder="Create by" type="text" class="form-control" value="{{ $order->created_at }}" readonly>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="order_status" class="col-md-2 text-md-right col-form-label">Trạng thái đơn hàng</label>
                            <div class="col-md-9 col-xl-9">
                                <select required name="status" id="order_status" class="form-control">
                                    <option value="">-- Chọn trạng thái --</option>
                                    <option value="ordered" {{ $order->status == 'ordered' ? 'selected' : '' }}>Đã đặt</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Đã giao</option>
                                    <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Đã hủy</option>
                                </select>
                            </div>
                        </div>

                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="{{ route('all_order') }}" class="border-0 btn btn-outline-danger mr-1">
                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                        <i class="fa fa-times fa-w-20"></i>
                                    </span>
                                    <span>Huỷ</span>
                                </a>

                                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-download fa-w-20"></i>
                                    </span>
                                    <a style="color: white" href="{{ route('all_order') }}">Xác nhận</a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
