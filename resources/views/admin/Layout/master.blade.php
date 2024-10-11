<!doctype html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin - CodeLean eShop</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description"
        content="This is an example dashboard (CodeLean) created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <link href="{{asset('backend/main.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/my_style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
            </div>    
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Danh sách quản lý</li>
                                <li class="{{ Request::is('Admin/*') ? 'mm-active' : '' }}">
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-plugin"></i>Trở về web chính
                                    </a>
                                    <ul>
                                        <li>
                                            <a style="width: 180px;" href="{{ route('all_user') }}" class="{{ Request::is('admin/users*') ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Quản lý người dùng
                                            </a>
                                        </li>
                                        <li>
                                            <a style="width: 180px;" href="{{ route('all_order') }}" class="{{ Request::is('admin/orders*') ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Quản lý đơn hàng
                                            </a>
                                        </li>
                                        <li>
                                            <a style="width: 180px;" href="{{ route('all_product') }}" class="{{ Request::is('admin/products*') ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Quản lý sản phẩm
                                            </a>
                                        </li>
                                        <li>
                                            <a style="width: 180px;" href="{{ route('all_category') }}" class="{{ request()->routeIs('all_category') ? 'active' : '' }}">
                                                <i class="metismenu-icon"></i>Quản lý danh mục
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a style="width: 180px;" href="{{ route('all_brand') }}" class="{{ Request::is('admin/brands*') ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Quản lý loài hoa
                                            </a>
                                        </li>
                                        <li>
                                            <a style="width: 180px;" href="{{ route('all_gallery') }}" class="{{ Request::is('admin/gallery*') ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Quản lý thư viện ảnh
                                            </a>
                                        </li>
                                        <li>
                                            <a style="width: 180px;" href="{{ route('all_contact') }}" class="{{ Request::is('admin/contacts*') ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Quản lý đơn liên hệ
                                            </a>
                                        </li>
                                        <li>
                                            <a style="width: 180px;" href="{{ route('revenue') }}" class="{{ Request::is('revenue*') ? 'mm-active' : '' }}">
                                                <i class="metismenu-icon"></i>Quản lý doanh thu
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>

                    </div>
                </div>
            </div>

            <div class="app-main__outer">

                <!-- Main -->
                @yield('content')
            </div>
        </div>

    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    
    <script src="public/backend/assets/scripts/jquery-3.2.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="./public/backend/assets/scripts/main.js"></script>
    <script type="text/javascript" src="./public/backend/assets/scripts/my_script.js"></script>
</body>

</html>