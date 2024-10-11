@extends('layouts.base')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Giới thiệu</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('app.index')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Giới thiệu</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-frame">
                        <img class="img-fluid" src="{{ asset('images/' . $aboutUsData->where('id', 1)->first()->image) }}" alt="{{ $aboutUsData->where('id', 1)->first()->title }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="noo-sh-title-top">{{ $aboutUsData->where('id', 1)->first()->title }}</h2>
                    <p>{{ $aboutUsData->where('id', 1)->first()->description }}</p>
                </div>
                
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Bạn có thể Tin tưởng chúng tôi</h3>
                        <p>FreshShop luôn đặt uy tín lên hàng đầu.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Chuyên nghiệp tận tâm</h3>
                        <p>FreshShop cung cấp dịch vụ cắm hoa chuyên nghiệp và chỉn chu.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Kiến thức chuyên sâu</h3>
                        <p>FreshShop sở hữu đội ngũ giàu kinh nghiệm, am hiểu về hoa.</p>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12">
                    <h2 class="noo-sh-title">Thành viên chúng tôi</h2>
                </div>
                @foreach($aboutUsData->where('id', '>', 1) as $member)
                    <div class="col-sm-6 col-lg-3">
                        <div class="hover-team">
                            <div class="our-team">
                                <img src="{{ asset('images/' . $member->image) }}" alt="{{ $member->title }}" />
                                <div class="team-content">
                                    <h3 class="title">{{ $member->title }}</h3>
                                    <span class="post">Nhân viên</span>
                                </div>
                                <ul class="social">
                                    <li><a href="#" class="fab fa-facebook"></a></li>
                                    <li><a href="#" class="fab fa-twitter"></a></li>
                                    <li><a href="#" class="fab fa-google-plus"></a></li>
                                    <li><a href="#" class="fab fa-youtube"></a></li>
                                </ul>
                                <div class="icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            </div>
                            <div class="team-description">
                                <p>{{ $member->description }}</p>
                            </div>
                            <hr class="my-0">
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End About Page -->
@endsection
