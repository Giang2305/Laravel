@extends('Admin.Layout.master')
@section('content')
<!-- Main -->
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Quản lý đơn hàng
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                </div>

                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Mã đơn hàng</th>
                                <th>Người đặt</th>
                                <th class="text-center">Địa chỉ</th>
                                <th class="text-center">Tổng tiền</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_order as $order)
                            <tr>
                                <td class="text-center text-muted">#{{ $order->id }}</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            {{ $order->lastname }} {{ $order->firstname }}
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $order->line1 }}, {{ $order->city }}, {{ $order->province }}, {{ $order->country }}
                                </td>
                                <td class="text-center">${{ $order->total }}</td>
                                <td class="text-center">
                                    <div class="badge badge-dark">
                                        {{ $order->status }}
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="{{ $order->status !== 'canceled' ? route('edit_order', ['id' => $order->id]) : '#' }}" 
                                        data-toggle="tooltip" 
                                        title="Edit" 
                                        data-placement="bottom" 
                                        class="btn btn-sm border-0 {{ $order->status === 'canceled' ? 'btn-danger disabled' : 'btn-outline-warning' }}" 
                                        {{ $order->status === 'canceled' ? 'aria-disabled="true"' : '' }}>
                                        <span class="btn-icon-wrapper opacity-8">
                                            <i class="fa fa-edit fa-w-20"></i>
                                        </span>
                                    </a>
                                    {{-- <form action="{{ route('delete_order', $order->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Xác nhận xoá đơn hàng này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-toggle="tooltip" title="Delete" data-placement="bottom" class="btn btn-hover-shine btn-outline-danger border-0 btn-sm">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-trash fa-w-20"></i>
                                            </span>
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-block card-footer">
                    <!-- Pagination Navigation -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection