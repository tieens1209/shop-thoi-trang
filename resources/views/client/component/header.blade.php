<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from martfury.pl/utero/html/v1/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 15:53:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    {{-- <link href="assets/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/theme7b30.css?v=4" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('assets/client/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/client/css/theme7b30.css?v=4') }}" rel="stylesheet" type="text/css" />

    <!-- Css Styles -->
    
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    @yield('custom-css')
    <!-- For Js Library -->
    {{-- <script src="assets/vendor7b30.js?v=4"></script>
  <script src="assets/theme7b30.js?v=4"></script> --}}
    <script src="{{ asset('assets/client/js/vendor7b30.js?v=4') }}"></script>
    <script src="{{ asset('assets/client/js/theme7b30.js?v=4') }}"></script>
    <!-- Thêm Bootstrap CSS -->
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
</head>
<style>
    .header__top__hover {
        position: relative;
    }

    .header__top__hover span {}

    .header__top__hover ul {
        opacity: 0;
        /* Ẩn menu */
        visibility: hidden;
        /* Ẩn menu khỏi bố cục */
        position: absolute;
        /* Đặt vị trí của <ul> */
        top: 220%;
        /* Khoảng cách từ phần tử cha */
        right: 0;
        /* Căn phải với phần tử cha */
        width: 150px;
        /* Điều chỉnh chiều rộng nếu cần */
        background-color: #fff;
        /* Màu nền */
        border: 1px solid #ddd;
        /* Đường viền */
        padding: 0;
        margin: 0;
        list-style-type: none;
        transform: translateY(10px);
        /* Di chuyển menu xuống dưới để tạo hiệu ứng */
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        /* Thêm hiệu ứng chuyển tiếp */
    }

    .header__top__hover:hover ul {
        opacity: 1;
        /* Hiện menu */
        visibility: visible;
        /* Hiện menu trong bố cục */
        transform: translateY(0);
        /* Di chuyển menu về vị trí ban đầu */
    }

    .product__details__option__size label {
        color: #111111;
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        display: inline-block;
        border: 1px solid #e5e5e5;
        padding: 6px 15px;
        margin-bottom: 0;
        margin-right: 5px;
        cursor: pointer;
    }

    .product__details__option__size input {
        position: absolute;
        visibility: hidden;
    }

    .product__details__option__size label.active {
        background: #111111;
        color: #ffffff;
        border-color: #111111;
    }
</style>


<body class="home home-classic">
    <div id="main">
        <!-- Promo bar -->
        <div class="promo-bar promo-bar--type-4">
            <!-- Container -->
            <div class="container">
                Autumn <span>SALE</span> - up to 30% off &nbsp;<a href="#"><i>Learn more</i></a>
            </div>
            <!-- End container -->
        </div>
        <!-- End promo bar -->
        <!-- Header -->
        <header class="header header--type-6 js-header">
            <!-- Container -->
            <div class="container">
                <!-- Header container -->
                <div class="header__container d-flex align-items-center">
                    <!-- Open Mobile Menu -->
                    <div class="header__open-mobile-menu"><a href="#" class="js-open-mobile-menu"><i
                                class="lnil lnil-menu"></i><i class="lnil lnil-close"></i></a></div>
                    <!-- End Open Mobile Menu -->
                    <!-- Search form -->
                    <form class="header__search">
                        <!-- Search input -->
                        <input type="text" class="header-search__input" placeholder="Type & hit enter..." />
                        <!-- End search input -->
                        <!-- Search button -->
                        <button type="submit" class="header-search__button"><i
                                class="lnil lnil-search-alt"></i></button>
                        <!-- End search button -->
                    </form>
                    <!-- End search form -->
                    <!-- Mobile left search -->
                    <div class="mobile-left-search"><a href="#" class="js-open-popup-search"><i
                                class="lnil lnil-search-alt"></i></a></div>
                    <!-- End mobile left search -->
                    <!-- Logo -->
                    <h1 class="header__logo">
                        <a href="{{ route('home') }}">
                            <img alt="Logo" data-sizes="auto"
                                data-srcset="https://routine.vn/media/amasty/webp/logo/websites/1/logo-black-2x_png.webp 400w,
                                 https://routine.vn/media/amasty/webp/logo/websites/1/logo-black-2x_png.webp 800w"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                height="23px" class="lazyload lazy-effect" />
                        </a>
                        <style type="text/css">
                            @media (max-width: 991px) {
                                .header__logo img {
                                    height: 14px;
                                }
                            }
                        </style>
                    </h1>

                    <!-- End logo -->
                    <!-- Header right -->
                    <ul class="header__right">

                        <li>
                            <a href="{{ route('wishlist') }}"><i class="lnil lnil-heart"></i><span>0</span></a>
                        </li>
                        <li class="header__cart">
                            <a href="{{ route('viewCart') }}"><i
                                    class="lnil lnil-cart"></i><span>{{ $cartItemsCount }}</span></a>
                            <!-- Header cart -->
                        </li>
                        <li class="d-none d-md-block">

                            {{-- <a href="{{ route('account') }}"><i class="lnil lnil-user"></i></a> --}}
                            @if (Auth::check())
                                <div class="header__top__hover">
                                    <span>Hi, {{ Auth::user()->name }} <i class="arrow_carrot-down"></i></span>
                                    <ul class="text-center">
                                        <a href="{{ route('logout') }}">
                                            <li>Đăng xuất</li>
                                        </a>
                                        @if (Auth::user()->role == 1)
                                            <a href="{{ route('admin.product.index') }}">
                                                <li>Quản trị</li>
                                            </a>
                                        @endif
                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login') }}"><i class="lnil lnil-user"></i></a>
                            @endif

                        </li>
                    </ul>
                    <!-- End header right -->
                </div>
                <!-- End header container -->
                <!-- Navigation -->
                <ul class="header__nav header__nav--type-4">
                    <li>
                        <a href="{{ route('home') }}" class="nav__item nav__item--current">Home</a>

                    </li>
                    <li>
                        <a href="{{ route('listProduct') }}" class="nav__item">Product</a>

                    </li>

                    <li>
                        <a href="{{ route('listOrder') }}" class="nav__item">Order</a>
                    </li>
                    <li>
                        <a href="{{ route('listBlog') }}" class="nav__item">Blog</a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}" class="nav__item">About</a>
                    </li>
                    
                    <li>
                        <a href="{{ route('contact') }}" class="nav__item">Contact</a>

                </ul>
                <!-- End navigation -->
            </div>
            <!-- End container -->
            <!-- Mobile menu -->
            <div class="mobile-menu js-mobile-menu">
                <!-- Carousel -->
                <div class="js-mobile-menu-carousel">
                    <!-- First step -->
                    <div class="mobile-menu__first-step">
                        <!-- List -->
                        <ul class="first-step">
                            <li><a href="{{ route('home') }}" class="js-mobile-menu-item" data-index="1">Home<i
                                        class="lnil lnil-chevron-right"></i></a></li>
                            <li><a href="{{ route('listProduct') }}" class="js-mobile-menu-item"
                                    data-index="2">Shop<i class="lnil lnil-chevron-right"></i></a></li>
                            <li><a href="#" class="js-mobile-menu-item" data-index="3">Product</a></li>
                            <li><a href="blog.html" class="js-mobile-menu-item" data-index="4">Blog</a></li>
                            <li><a href="#" class="js-mobile-menu-item" data-index="5">Pages<i
                                        class="lnil lnil-chevron-right"></i></a></li>
                        </ul>
                        <!-- End list -->
                    </div>
                    <!-- End first step -->
                    <!-- Second step -->
                    <div class="mobile-menu__second-step js-second-step-mobile-menu">
                        <!-- Home -->
                        <div class="second-step active js-second-step-mobile-menu-item" data-index="1">
                            <!-- Go to previous -->
                            <div class="second-step__go-to-previous">
                                <a href="#" class="js-go-to-previous-mobile-menu"><i
                                        class="lnil lnil-chevron-left"></i> Home</a>
                            </div>
                            <!-- End go to previous -->
                            <!-- Column title -->
                            <div class="standard-column__title">Styles</div>
                            <!-- End column title -->

                        </div>
                        <!-- End home -->
                        <!-- Shop -->
                        <div class="second-step active js-second-step-mobile-menu-item" data-index="2">
                            <!-- Go to previous -->
                            <div class="second-step__go-to-previous">
                                <a href="#" class="js-go-to-previous-mobile-menu"><i
                                        class="lnil lnil-chevron-left"></i> Shop</a>
                            </div>
                            <!-- End go to previous -->
                            <!-- Column -->
                            <div class="mega-menu__standard-column">
                                <!-- Column title -->
                                <div class="standard-column__title">Shop</div>
                                <!-- End column title -->
                                <!-- Column nav -->
                                <ul class="standard-column__nav">
                                    <li><a href="{{ route('listProduct') }}">Grid 3 Column <span
                                                class="nav__item-tag nav__item-tag--default">default</span></a></li>
                                    <li><a href="shop-2.html">Grid 4 Column</a></li>
                                    <li><a href="shop-3.html">Full Width 3 Column</a></li>
                                    <li><a href="shop-4.html">Full Width 5 Column</a></li>
                                    <li><a href="shop-5.html">Collection <span
                                                class="nav__item-tag nav__item-tag--hot">hot</span></a></li>
                                    <li><a href="shop-6.html">Left Sidebar</a></li>
                                </ul>
                                <!-- End column nav -->
                            </div>
                            <!-- End column -->
                            <!-- Column -->
                            <div class="mega-menu__standard-column">
                                <!-- Column title -->
                                <div class="standard-column__title">product layouts</div>
                                <!-- End column title -->
                                <!-- Column nav -->
                                <ul class="standard-column__nav">
                                    <li><a href="#">Default</a></li>
                                    <li><a href="product-layout-1.html">Sticky Info <span
                                                class="nav__item-tag nav__item-tag--popular">popular</span></a></li>
                                    <li><a href="product-layout-2.html">With Sidebar</a></li>
                                    <li><a href="product-layout-3.html">Full Width <span
                                                class="nav__item-tag nav__item-tag--hot">hot</span></a></li>
                                    <li><a href="product-layout-4.html">Grid Gallery <span
                                                class="nav__item-tag nav__item-tag--trending">trending</span></a></li>
                                </ul>
                                <!-- End column nav -->
                            </div>
                            <!-- End column -->
                            <!-- Column -->
                            <div class="mega-menu__standard-column">
                                <!-- Column title -->
                                <div class="standard-column__title">Product Types</div>
                                <!-- End column title -->
                                <!-- Column nav -->
                                <ul class="standard-column__nav">
                                    <li><a href="product-type-1.html">Simple</a></li>
                                    <li><a href="product-type-2.html">Various</a></li>
                                    <li><a href="product-type-3.html">Colors Swatches</a></li>
                                    <li><a href="product-type-4.html">Images Swatches</a></li>
                                    <li><a href="product-type-5.html">Groupped</a></li>
                                    <li><a href="product-type-6.html">Affiliate</a></li>
                                    <li><a href="product-type-7.html">Featured Video</a></li>
                                    <li><a href="product-type-8.html">Countdown Timer</a></li>
                                    <li><a href="product-type-9.html">Pre-orders <span
                                                class="nav__item-tag nav__item-tag--hot">hot</span></a></li>
                                    <li><a href="product-type-10.html">Out of Stock</a></li>
                                    <li><a href="product-type-11.html">Guarantee Safe Checkout</a></li>
                                    <li><a href="product-type-12.html">Bundle <span
                                                class="nav__item-tag nav__item-tag--trending">trending</span></a></li>
                                </ul>
                                <!-- End column nav -->
                            </div>
                            <!-- End column -->
                            <!-- Column -->
                            <div class="mega-menu__standard-column">
                                <!-- Column title -->
                                <div class="standard-column__title">Others</div>
                                <!-- End column title -->
                                <!-- Column nav -->
                                <ul class="standard-column__nav">
                                    <li><a href="{{ route('cart') }}">Shopping Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                </ul>
                                <!-- End column nav -->
                            </div>
                            <!-- End column -->
                        </div>
                        <!-- End shop -->
                        <!-- Shop -->
                        <div class="second-step active js-second-step-mobile-menu-item" data-index="5">
                            <!-- Go to previous -->
                            <div class="second-step__go-to-previous">
                                <a href="#" class="js-go-to-previous-mobile-menu"><i
                                        class="lnil lnil-chevron-left"></i> Pages</a>
                            </div>
                            <!-- End go to previous -->
                            <!-- Column -->
                            <div class="mega-menu__standard-column">
                                <!-- Column nav -->
                                <ul class="standard-column__nav">
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                    <li><a href="{{ route('cart') }}">Shopping Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="{{ route('wishlist') }}">Wishlist</a></li>
                                    <li><a href="404.html">404 Page</a></li>
                                    <li><a href="coming_soon.html">Coming Soon</a></li>
                                    <li><a href="#">Account</a></li>
                                    <li><a href="{{ route('faq') }}">Faq</a></li>
                                </ul>
                                <!-- End column nav -->
                            </div>
                            <!-- End column -->
                        </div>
                        <!-- End shop -->
                    </div>
                    <!-- End second step -->
                </div>
                <!-- End carousel -->
            </div>
            <!-- End mobile menu -->
        </header>
        <!-- End header -->
        <!-- Fixed header -->
        <div class="fixed-header js-fixed-header"></div>
        <!-- End fixed header -->
