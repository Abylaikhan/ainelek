<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!-- Owl Carousel Default CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <!-- Imagelightbox CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/imagelightbox.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Dark CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <title>@yield('title') - Айнелёк балабақшасы</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.ico') }}">
</head>
<body>
<!-- Start Preloader Area -->
<div class="preloader">
    <div class="loader">
        <div class="wrapper">
            <div class="circle circle-1"></div>
            <div class="circle circle-1a"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
        </div>
    </div>
</div>
<!-- End Preloader Area -->

<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" class="black-logo" alt="image">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" class="black-logo" alt="image">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                Басты бет
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link">
                                Біз туралы
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faq') }}" class="nav-link">
                                Жиі қойылатын сұрақтар
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('blogs') }}" class="nav-link">
                                Жаңалықтар
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contacts') }}" class="nav-link">
                                Байланыстар
                            </a>
                        </li>
                    </ul>

                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <a href="tel:{{ $phone->content }}" class="default-btn">{{ $phone->content }}</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="option-inner">
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <a href="tel:{{ $phone->content }}" class="default-btn">{{ $phone->content }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
    {{ $slot }}

<!-- Start Footer Area -->
<section class="footer-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <ul class="footer-contact-info">
                        <li>
                            <i class='bx bxs-phone'></i>
                            <span>Email</span>
                            <a href="emailto:{{ $email->content }}">{{ $email->content }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <ul class="footer-contact-info">
                        <li>
                            <i class='bx bxs-phone'></i>
                            <span>Телефон</span>
                            <a href="tel:{{ $phone->content }}">{{ $phone->content }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <ul class="footer-contact-info">
                        <li>
                            <i class='bx bx-map'></i>
                            <span>Мекенжай</span>
                            {{ $address->content }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <ul class="footer-contact-info">
                        <li>
                            <i class='bx bxl-instagram'></i>
                            <span>Әлеуметтік желілер</span>
                            <a href="{{ $instagram->content }}">instagram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Footer Area -->

<!-- Start Copy Right Area -->
<div class="copyright-area">
    <div class="container">
        <div class="copyright-area-content">
            <p>Барлық құқықтар қорғалған</p>
        </div>
    </div>
</div>
<!-- End Copy Right Area -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class='bx bx-up-arrow-alt'></i>
</div>
<!-- End Go Top Area -->

<!-- Jquery Slim JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- Meanmenu JS -->
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Imagelightbox JS -->
<script src="{{ asset('assets/js/imagelightbox.min.js') }}"></script>
<!-- Odometer JS -->
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<!-- Jquery Appear JS -->
<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
<!-- Ajaxchimp JS -->
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<!-- Form Validator JS -->
<script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
<!-- Contact JS -->
<script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
