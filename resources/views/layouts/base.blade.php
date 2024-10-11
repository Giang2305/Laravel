<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Freshshop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @livewireStyles
    @stack('style')

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-5" style="display: grid; flex-direction: column; justify-content: center;">
                </div>
                <div class="col-5">
					<li class="login-box" style="display: table; width: 0px">
						<div class="cart-media name-usr">
                        @auth 
                            <span style="color: white; font-size: 18px; padding-right: 25px;">Người dùng: {{Auth::user()->name}}</span>    
                        @endauth
                            
                        </div class="onhover-div profile-dropdown">
                            <ul style="display: block ruby;">
                                @if (Route::has('login'))  
                                    @auth 
                                        @if (Auth::user()->utype === 'ADM')
                                            <li>
                                                <a style="color: white; font-size: 18px; padding-right: 25px;" href="{{route('all_user')}}">Quản lý</a>
                                            </li>
                                        @else
                                            <li>
                                                <a style="color: white; font-size: 18px; padding-right: 25px;" href="{{ url('my-account') }}">Tài khoản</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a style="color: white; font-size: 18px; padding-right: 25px;" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('frmlogout').submit();">Đăng xuất</a>
                                            <form id="frmlogout" action="{{route('logout')}}" method="POST">
                                                @csrf
                                            </form>
                                        </li>  
                                    @else
                                        <li>
                                            <a style="color: white; font-size: 18px; padding-right: 25px;" href="{{route('login')}}">Đăng nhập</a>
                                        </li>
                                        <li>
                                            <a style="color: white; font-size: 18px; padding-right: 25px;" href="{{route('register')}}">Đăng ký</a>
                                        </li>
                                    @endauth                 
                                @endif
                            </ul>
					</div>
                </li>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="{{route('app.index')}}"><img src="{{ asset('images/logo.png')}}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul style="width: 769px" class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="{{route('app.index')}}">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Giới thiệu</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('shop.index')}}">Sản phẩm</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery.index') }}">Thư viện ảnh</a>
                        </li>
                        
                        
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact.form') }}">Liên hệ</a></li>
                        <li class="nav-item"><a class="nav-link" href="/checkout">Giỏ hàng</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse --> 

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul style="width: 201px;">
                        <li class="side-menu">
                            <a href="{{route('wishlist.list')}}">
                                <i class="fa fa-heart"></i>
                                <span id="wishlist-count" class="badge">{{Cart::instance("wishlist")->content()->count()}}</span>
                                <p>Yêu thích</p>
                            </a>
                        </li>
                        <li class="side-menu">
                            
							<a href="{{route('cart.index')}}">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge">{{Cart::instance('cart')->content()->count()}}</span>
								<p>Giỏ hàng</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
           
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    @yield('content')

    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Giờ mở quán</h3>
							<ul class="list-time">
								<li>Thứ hai - Thứ sáu: 08.00am to 05.00pm</li> <li>Thứ bảy: 10.00am to 08.00pm</li> <li>Chủ nhật: <span>Đóng cửa</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Nhận thông tin</h3>
							<form class="newsletter-box">
								<div class="form-group">
									<input class="" type="email" name="Email" placeholder="Email*" />
									<i class="fa fa-envelope"></i>
								</div>
								<button class="btn hvr-hover" type="submit">Đăng ký</button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Mạng xã hội</h3>
                            <br>
							<ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>Giới thiệu quán</h4>
                            <p>Những người thợ hoa đam mê của chúng tôi tự tay chọn từng bông hoa, đảm bảo bạn nhận được những bông hoa tươi và chất lượng tốt nhất.</p> 
							<p>Hãy đến Freshop ngay hôm nay và để niềm đam mê hoa của chúng tôi biến thế giới của bạn thành một tấm thảm rực rỡ với vẻ đẹp và niềm vui.</p> 							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Thông tin</h4>
                            <ul>
                                <li><a href="#">Về chúng tôi</a></li>
                                <li><a href="#">Chăm sóc khách hàng</a></li>
                                <li><a href="#">Vị trí quán</a></li>
                                <li><a href="#">Điều khoản &amp; Yêu cầu</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Thông tin giao hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Liên hệ</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Địa chỉ: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Số điện thoại: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('js/jquery.superslides.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap-select.js')}}"></script>
    <script src="{{ asset('js/inewsticker.js')}}"></script>
    <script src="{{ asset('js/bootsnav.js.')}}"></script>
    <script src="{{ asset('js/images-loded.min.js')}}"></script>
    <script src="{{ asset('js/isotope.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/baguetteBox.min.js')}}"></script>
    <script src="{{ asset('js/form-validator.min.js')}}"></script>
    <script src="{{ asset('js/contact-form-script.js')}}"></script>
    <script src="{{ asset('js/custom.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.js')}}"></script>


    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/custom_slick.js') }}"></script>
    <script src="{{ asset('assets/js/price-filter.js') }}"></script>
    <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/filter.js') }}"></script>
    <script src="{{ asset('assets/js/newsletter.js') }}"></script>
    <script src="{{ asset('assets/js/cart_modal_resize.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>
      @livewireScripts
    @stack('scripts')
</body>

</html>