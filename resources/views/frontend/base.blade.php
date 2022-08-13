<!doctype html>
<html lang="en">
<head>
    <title>{{ $about->nick_name }} &mdash; @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="keywords" content="portfolio, blog, personal, single">
    <meta name="author" content="">

    <link rel="stylesheet" href="{{ asset('css/vendor/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/jquery.fancybox.min.css') }}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body data-spy="scroll" data-target=".site-nav-target" data-offset="200">
    <nav class="unslate_co--site-mobile-menu">
        <div class="close-wrap d-flex">
            <a href="#" class="d-flex ml-auto js-menu-toggle">
                <span class="close-label">Close</span>
                <div class="close-times">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                </div>
            </a>
        </div>
        <div class="site-mobile-inner"></div>
    </nav>

    <div class="unslate_co--site-wrap">
        <div class="unslate_co--site-inner">
            <div class="lines-wrap">
                <div class="lines-inner">
                    <div class="lines"></div>
                </div>
            </div>
            <!-- END lines -->
            <nav class="unslate_co--site-nav site-nav-target">
                <div class="container">
                    <div class="row align-items-center justify-content-between text-left">
                        <div class="col-md-5 text-right">
                            <ul class="site-nav-ul js-clone-nav text-left d-none d-lg-inline-block">
                                <li class="has-children">
                                    <a href="{{ route('home') }}#home-section" class="nav-link">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('home') }}#portfolio-section" class="nav-link">Portfolio</a>
                                </li>
                                <li>
                                    <a href="{{ route('home') }}#about-section" class="nav-link">About</a>
                                </li>
                                <li>
                                    <a href="{{ route('home') }}#services-section" class="nav-link">Services</a>
                                </li>
                            </ul>
                        </div>
                        <div class="site-logo pos-absolute">
                            <a href="{{ route('home') }}" class="unslate_co--site-logo">{{ $about->nick_name }}<span>.</span></a>
                        </div>
                        <div class="col-md-5 text-right text-lg-left">
                            <ul class="site-nav-ul js-clone-nav text-left d-none d-lg-inline-block">
                                <li><a href="{{ route('home') }}#skills-section" class="nav-link">Skills</a></li>
                                <li><a href="{{ route('home') }}#testimonial-section" class="nav-link">Testimonial</a></li>
                                <li><a href="{{ route('home') }}#journal-section" class="nav-link">Journal</a></li>
                                <li><a href="{{ route('home') }}#contact-section" class="nav-link">Contact</a></li>
                            </ul>

                            <ul class="site-nav-ul-none-onepage text-right d-inline-block d-lg-none">
                                <li><a href="#" class="js-menu-toggle">Menu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- END nav -->
            @yield('content')
        </div>
        <!-- END .unslate_co-site-inner -->
        <footer class="unslate_co--footer unslate_co--section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="footer-site-logo"><a href="#">{{ $about->nick_name }}<span>.</span></a></div>
                        <ul class="footer-site-social">
                            @foreach($socials as $social)
                                <li><a href="{{ $social->link }}" target="_blank">{{ $social->name }}</a></li>
                            @endforeach
                        </ul>
                        <p class="site-copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Loader -->
    <div id="unslate_co--overlayer"></div>
    <div class="site-loader-wrap">
        <div class="site-loader"></div>
    </div>

    <script src="{{ asset('js/scripts-dist.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
