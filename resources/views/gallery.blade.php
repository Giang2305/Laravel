@extends('layouts.base')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Thư viện ảnh</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('app.index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thư viện ảnh</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Gallery  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Thư viện ảnh</h1>
                        <p>Ảnh của những sản phẩm của quán...</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group" style="width: 764px;">
                            <button class="active" data-filter="*" onclick="filterImages('*')">Tất cả</button>
                            @foreach($brands as $brand)
                                <button style="margin: 5px" data-filter="{{ $brand->id }}" onclick="filterImages({{ $brand->id }})">{{ $brand->name }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div id="gallery" class="row" style="display: flex; flex-wrap: wrap;">
                @foreach($galleries as $gallery)
                <div class="col-lg-3 col-md-6 special-grid bulbs brand-{{ $gallery->brand_id }}">
                    <div class="products-single fix">
                        <div class="box-img-hover" style="height: 300px">
                            <img src="{{ asset('images/' . $gallery->image_path) }}" class="img-fluid" alt="Image" style="height: 100%;object-fit: cover;overflow: hidden;">
                        </div>
                    </div>
                </div>
               @endforeach
            
            </div>
            
        </div>
    </div>
    <!-- End Gallery  -->

@endsection
@push("scripts")
<script>
    function filterImages(brandId) {
        const galleryItems = document.querySelectorAll('.special-grid');
        galleryItems.forEach(item => {
            if (brandId === '*' || item.classList.contains('brand-' + brandId)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>

@endpush