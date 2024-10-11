@extends('Admin.Layout.master')
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-photo-gallery icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    Quản lý thư viện ảnh
                </div>
            </div>

            <div class="page-title-actions">
                <a href="{{ route('create_gallery') }}" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-plus fa-w-20"></i>
                    </span>
                    Tạo mới
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
            </div>

            <div class="row">
                @foreach($galleries as $gallery)
                    <div class="col-lg-3 col-md-6 special-grid bulbs brand-{{ $gallery->brand_id }}" style="padding-left: 75px; padding-bottom: 30px; padding-top: 30px">
                        <div class="products-single fix">
                            <div class="box-img-hover" style="position: relative; overflow: hidden; width: 242.5px;">
                                <img src="{{ asset('images/' . $gallery->image_path) }}" class="img-fluid" alt="Image" style="display: block; width: 242px; height: 242px; object-fit:cover;">
                                <div class="mask-icon" style="display: none;"></div> <!-- Hide the overlay -->
                            </div>
                            <div class="mt-2">
                                <!-- Edit button -->
                                <a style="width:119px" href="{{ route('edit_gallery', $gallery->id) }}" class="btn btn-primary btn-sm">
                                    Sửa
                                </a>
                                <!-- Delete button -->
                                <form action="{{route('delete_gallery', $gallery->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button style="width:119px" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?');">
                                        Xóa
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection