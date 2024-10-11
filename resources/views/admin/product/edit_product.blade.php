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
                    Sửa sản phẩm
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form method="post" action="{{ route('update_product', $product->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                    
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-2 text-md-right col-form-label">Tên sản phẩm</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="name" id="name" placeholder="Name" type="text" class="form-control" value="{{ $product->name }}">
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="slug" class="col-md-2 text-md-right col-form-label">Tên phụ</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="slug" id="slug" placeholder="Slug" type="text" class="form-control" value="{{ $product->slug }}">
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="description" class="col-md-2 text-md-right col-form-label">Mô tả</label>
                            <div class="col-md-9 col-xl-9">
                                <textarea class="form-control" name="description" id="description" placeholder="Description">{{ $product->description }}</textarea>
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="price" class="col-md-2 text-md-right col-form-label">Giá tiền</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="price" id="price" placeholder="Price" type="text" class="form-control" value="{{ $product->price }}">
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="image" class="col-md-2 text-md-right col-form-label">Ảnh</label>
                            <div class="col-md-9 col-xl-9">
                                <input name="image" type="file" class="form-control-file">
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="images" class="col-md-2 text-md-right col-form-label">Nhiều ảnh</label>
                            <div class="col-md-9 col-xl-9">
                                <input name="images[]" type="file" class="form-control-file" multiple>
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="stock_status" class="col-md-2 text-md-right col-form-label">Trạng thái sản phẩm</label>
                            <div class="col-md-9 col-xl-9">
                                <select required name="stock_status" id="stock_status" class="form-control">
                                    <option value="instock" {{ $product->stock_status == 'instock' ? 'selected' : '' }}>instock</option>
                                    <option value="outstock" {{ $product->stock_status == 'outstock' ? 'selected' : '' }}>outstock</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="quantity" class="col-md-2 text-md-right col-form-label">Số lượng</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="quantity" id="quantity" placeholder="Quantity" type="text" class="form-control" value="{{ $product->quantity }}">
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="product_category_id" class="col-md-2 text-md-right col-form-label">Danh mục</label>
                            <div class="col-md-9 col-xl-9">
                                <select required name="category_id" id="product_category_id" class="form-control">
                                    <option value="">-- Danh mục --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="brand_id" class="col-md-2 text-md-right col-form-label">Loài hoa</label>
                            <div class="col-md-9 col-xl-9">
                                <select required name="brand_id" id="brand_id" class="form-control">
                                    <option value="">-- Loài hoa --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="featured" class="col-md-2 text-md-right col-form-label">Đặc sắc</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="position-relative form-check pt-sm-2">
                                    <input name="featured" id="featured" type="checkbox" value="1" class="form-check-input" {{ $product->featured ? 'checked' : '' }}>
                                    <label for="featured" class="form-check-label">Đặc sắc</label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="is_active" class="col-md-2 text-md-right col-form-label">Hiển thị</label>
                            <div class="col-md-9 col-xl-9">
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="is_active" id="is_active_yes" value="1" class="form-check-input" {{ $product->is_active ? 'checked' : '' }}>
                                        Có
                                    </label>
                                </div>
                                <div class="position-relative form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="is_active" id="is_active_no" value="0" class="form-check-input" {{ !$product->is_active ? 'checked' : '' }}>
                                        Không
                                    </label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group">
                            <label for="created_by" class="col-md-2 text-md-right col-form-label">Tạo bởi</label>
                            <div class="col-md-9 col-xl-9">
                                <input required name="created_by" id="created_by" placeholder="Create by" type="text" class="form-control" value="{{ $product->created_by }}">
                            </div>
                        </div>
                    
                        <div class="position-relative row form-group mb-1">
                            <div class="col-md-9 col-xl-8 offset-md-2">
                                <a href="{{ route('all_product') }}" class="border-0 btn btn-outline-danger mr-1">
                                    <span class="btn-icon-wrapper pr-1 opacity-8">
                                        <i class="fa fa-times fa-w-20"></i>
                                    </span>
                                    <span>Huỷ</span>
                                </a>
                    
                                <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-8">
                                        <i class="fa fa-download fa-w-20"></i>
                                    </span>
                                    <span>Lưu</span>
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
