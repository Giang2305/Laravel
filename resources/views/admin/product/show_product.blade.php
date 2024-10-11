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
                    Quản lý sản phẩm
                </div>
            </div>

            <div class="page-title-actions">
                <a href="{{ URL::to('/admin/product/create')}}" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus fa-w-20"></i>
                    </span>
                    Thêm mới
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
                                <th class="text-center">Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th class="text-center">Giá tiền</th>
                                <th class="text-center">Ảnh</th>
                                <th class="text-center">Danh mục</th>
                                <th class="text-center">Loài hoa</th>
                                <th class="text-center">Hiển thị</th>
                                <th class="text-center">Tạo bởi</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_product as $product)
                                <tr>
                                    <td class="text-center text-muted">#{{ $product->id }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ $product->name }}</div>
                                                    <div class="widget-subheading opacity-7">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $product->price }}</td>
                                    <td class="text-center">
                                        <div class=" mr-3">
                                            <div class="">
                                                <img style="height: 80px; margin-left: 214px;" data-toggle="tooltip" title="Image"
                                                     data-placement="bottom"
                                                     src="{{ asset('images/' . $product->image) }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success mt-2">
                                            {{ $product->category_name}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success mt-2">
                                            {{ $product->brand_name}}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge mt-2 {{ $product->is_active ? 'badge-success' : 'badge-danger' }}">
                                            {{ $product->is_active ? 'True' : 'False' }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="badge badge-success mt-2">
                                            {{ $product->created_by }}
                                        </div>
                                    </td>
                                    <td class="text-center">                                       
                                        <a href="{{ route('edit_product', ['id' => $product->id]) }}" data-toggle="tooltip" title="Edit"
                                            data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                             <span class="btn-icon-wrapper opacity-8">
                                                 <i class="fa fa-edit fa-w-20"></i>
                                             </span>
                                         </a>
                                         <form action="{{ route('delete_product', $product->id) }}" method="POST" onsubmit="return confirm('Xác nhận xoá sản phẩm này?')" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-hover-shine btn-outline-danger border-0 btn-sm" data-toggle="tooltip" title="Delete" data-placement="bottom">
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

                

            </div>
        </div>
    </div>
</div>
@endsection
