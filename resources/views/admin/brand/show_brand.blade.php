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
                    Quản lý loài hoa
                </div>
            </div>

            <div class="page-title-actions">
                <a href="{{ URL::to('/admin/brand/create')}}" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus fa-w-20"></i>
                    </span>
                    Tạo mới
                </a>
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
                                <th class="text-center">Mã loài hoa</th>
                                <th>Tên loài hoa</th> 
                                <th class="text-center">Số sản phẩm</th>
                                <th class="text-center">Hiển thị</th>
                                <th class="text-center">Tạo bởi</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_brand as $brand)
                                <tr>
                                    <td class="text-center text-muted">#{{ $brand->id }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ $brand->name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2" style="text-align: center;">
                                                        {{ $brand->product_count }} {{ Str::plural('product', $brand->product_count) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="badge mt-2 {{ $brand->is_active ? 'badge-success' : 'badge-danger' }}">
                                            {{ $brand->is_active ? 'True' : 'False' }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success mt-2">
                                            {{ $brand->created_by }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('edit_brand', $brand->id) }}" data-toggle="tooltip" title="Edit"
                                           data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-edit fa-w-20"></i>
                                            </span>
                                        </a>
                                        <form action="{{ route('delete_brand', $brand->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Xác nhận xoá loài hoa?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-toggle="tooltip" title="Delete" data-placement="bottom" class="btn btn-hover-shine btn-outline-danger border-0 btn-sm">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-trash fa-w-20"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-block card-footer">
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
