<!doctype html>
<html class="no-js" lang="">

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-J5N4BSCRPL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-J5N4BSCRPL');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('media/logos/logo.png') }}">
    <!-- Normalize Css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/normalize.css') }}">
    <!-- Main Css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/main.css') }}">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/animate.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/fontawesome-all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/fonts/flaticon.css') }}">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/owl.theme.default.min.css') }}">
    <!-- Nouislider Style CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/nouislider.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/magnific-popup.css') }}">
    <!-- Custom Css -->

    <!-- Slick Caousel CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick-theme.css') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('front-assets/style.css') }}">
    <!-- Modernizr Js -->
    <script src="{{ asset('front-assets/js/modernizr-3.6.0.min.js') }}"></script>

    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-YY4JGP7CDY"></script>
    <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-YY4JGP7CDY'); </script> --}}



    @livewireStyles
</head>

<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    {{-- <div id="preloader"></div> --}}
    <!-- Preloader End Here -->
    <!-- ScrollUp Start Here -->
    <a href="#wrapper" data-type="section-switch" class="scrollup">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <!-- ScrollUp End Here -->
    <div id="wrapper" class="wrapper">
        <!-- Header Area Start Here -->
        <header id="site-header" class="header-one">
            <div class="header-main header-sticky bg--main">
                <div class="container-fluid">
                    <div class="mob-menu-open toggle-menu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-12">
                            <div class="site-logo">
                                <a href="{{ route('home') }}" class="main-logo"
                                    style="text-decoration: none; color:white">
                                    <img style="width: 70px" src="{{ asset('media/logos/logo.png') }}" alt="Site Logo">
                                    {{ config('app.name') }}</a>
                                <a href="{{ route('home') }}" class="sticky-logo" style="text-decoration: none;"><img
                                        style="width: 70px" src="{{ asset('media/logos/logo.png') }}" alt="Site Logo">
                                    {{ config('app.name') }}
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-7 col-12 possition-static">
                            <nav class="site-nav">
                                <ul class="site-menu">

                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('companies.index') }}">Companies</a></li>
                                    <li><a href="{{ route('home') }}#recommendUs">Recommend Us</a></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- Header Area End Here -->


        @yield('content')


        <!-- Footer Area Start Here -->
        <footer>
            <section class="footer-bottom-wrap">
                <div class="container">
                    <div class="copyright">
                        <p>© 2023 <a href="{{ route('home') }}"> {{ config('app.name') }} </a>. All Rights Reserved.
                        </p>
                    </div>
                </div>
            </section>
        </footer>
        <!-- Footer Area End Here -->
    </div>

    <!-- Modal End-->
    <!-- Jquery Js -->
    <script src="{{ asset('front-assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('front-assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    <!-- Plugins Js -->
    <script src="{{ asset('front-assets/js/plugins.js') }}"></script>
    <!-- Owl Carousel Js -->
    <script src="{{ asset('front-assets/js/owl.carousel.min.js') }}"></script>
    <!-- Imagesloaded Js -->
    <script src="{{ asset('front-assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Isotope js -->
    <script src="{{ asset('front-assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Silk Cauosel JS -->
    <script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
    <!-- Parallaxie JS -->
    <script src="{{ asset('front-assets/js/parallaxie.js') }}"></script>
    <!-- Smoothscroll Js -->
    <script src="{{ asset('front-assets/js/smoothscroll.min.js') }}"></script>

    <!-- Counterup Js -->
    <script src="{{ asset('front-assets/js/jquery.counterup.min.js') }}"></script>
    <!-- Waypoints Js -->
    <script src="{{ asset('front-assets/js/waypoints.min.js') }}"></script>
    <!-- Nouislider Js -->
    <script src="{{ asset('front-assets/js/nouislider.min.js') }}"></script>
    <!-- wNumb Js -->
    <script src="{{ asset('front-assets/js/wNumb.js') }}"></script>
    <!-- Magnific Popup Js -->
    <script src="{{ asset('front-assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smoothscroll Js -->

    <!-- Validator js -->
    <script src="{{ asset('front-assets/js/validator.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('front-assets/js/main.js') }}"></script>

    @livewireScripts

</body>



</html>
