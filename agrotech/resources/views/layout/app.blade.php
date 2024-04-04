<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Agro-Tech</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    @stack('css')

</head>

<body>

<!-- Spinner Start -->
<div id="spinner"
     class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{route('home')}}" class="navbar-brand"><h1 class="text-primary display-6">AgroTech</h1></a>
            {{--            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"--}}
            {{--                    data-bs-target="#navbarCollapse">--}}
            {{--                <span class="fa fa-bars text-primary"></span>--}}
            {{--            </button>--}}
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <div class="position-relative mx-auto">
                        <input class="form-control border-2 border-secondary w-100 py-1 px-3 rounded-pill" type="search"
                               placeholder="Search">
                        <button type="submit"
                                class="btn btn-primary border-2 border-secondary py-1 px-4 position-absolute rounded-pill text-white h-100"
                                style="top: 0; right: 0%;"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a href="{{route('create.article')}}" class="nav-item nav-link">Create Article</a>
                <a href="{{route('login')}}" class="nav-item nav-link">Sign in</a>
            </div>
        </nav>
    </div>

    <!-- categories -->
    <div class="col-lg-12">
        <nav class="nav d-flex justify-content-between">
            @foreach($cats as $cat)
                <a class="d-flex justify-content-center align-items-center m-2 py-2 bg-light rounded-pill active text-dark"
                   data-bs-toggle="pill" href="#tab-1" style="width: 130px;" href="">{{ $cat->name }}</a>
            @endforeach
        </nav>
    </div>
    <!-- end categories -->

</div>
<!-- Navbar End -->
<body class="text-center">

@yield('content')
<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-0">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="#">
                        <h1 class="text-primary mb-0">AgroTech</h1>
                    </a>
                </div>
                <form method="POST" action="{{ route('add_subscriber') }}">
                    @csrf
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="email"
                                   name="email" placeholder="Your Email">
                            <button type="submit"
                                    class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white"
                                    style="top: 0; right: 0;">Subscribe Now
                            </button>
                        </div>
                    </div>
                </form>
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>AGROTECH</a>, All right reserved.</span>
            </div>
            <div class="col-md-6 my-auto text-center text-md-end text-white">
                <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                <p>AGROTECH built for <a href="https://github.com/orgs/Youcode-Classe-E-2023-2024">IT-Titans</a> by <a
                        href="#">@mnaouer</a>.</p>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
        class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
@stack('js')

</html>

{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.bunny.net">--}}
{{--    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Custom styles for this template -->--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">--}}
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}

{{--    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>--}}

{{--    <!-- Bootstrap core CSS -->--}}
{{--    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">--}}

{{--    <!-- Custom styles for this template -->--}}
{{--    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">--}}

{{--    <!-- Scripts -->--}}
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
{{--    <style>--}}
{{--        .footer {--}}
{{--            background-color: #333;--}}
{{--            margin-top: 3rem;--}}
{{--            padding: 1rem 0;--}}
{{--            width: 100%;--}}
{{--        }--}}

{{--        .footer-text {--}}
{{--            color: #fff;--}}
{{--            font-size: 1.2rem;--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        .bd-placeholder-img {--}}
{{--            font-size: 1.125rem;--}}
{{--            text-anchor: middle;--}}
{{--            -webkit-user-select: none;--}}
{{--            -moz-user-select: none;--}}
{{--            user-select: none;--}}
{{--        }--}}

{{--        @media (min-width: 768px) {--}}
{{--            .bd-placeholder-img-lg {--}}
{{--                font-size: 3.5rem;--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}

{{--    @stack('css')--}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="container">--}}
{{--    <header class="blog-header py-3">--}}
{{--        <div class="row flex-nowrap justify-content-between align-items-center">--}}
{{--            <div class="col-4 pt-1">--}}
{{--                <a class="blog-header-logo text-dark" href="{{ route('home') }}">AGROTECH</a>--}}
{{--            </div>--}}

{{--            <div class="col-4 text-center">--}}
{{--                <div class="d-none d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center align-items-center">--}}
{{--                    <form class="form" action="" method="POST">--}}
{{--                        {{ route('title.search') }}--}}
{{--                        @csrf--}}
{{--                        <i class="fa fa-search"></i>--}}
{{--                        <input name="search" id="search-bar" type="text" class="form-control form-input" aria-label="search-bar" placeholder="Search...">--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-4 d-flex justify-content-end align-items-center">--}}
{{--                @role('admin')--}}
{{--                <a class="btn btn-sm btn-outline-secondary ms-2" href="">Admin</a>--}}
{{--                @endrole--}}

{{--                @auth()--}}
{{--                    @role('organizer|admin')--}}
{{--                    <a class="btn btn-sm btn-dark ms-2" href="">Create Article</a>--}}
{{--                    @endrole--}}
{{--                    <a class="btn btn-sm btn-outline-secondary ms-2" href="">Profile</a>--}}
{{--                @endauth--}}

{{--                @guest()--}}
{{--                    <a class="btn btn-sm btn-outline-secondary ms-2" href="">Sign in</a>--}}
{{--                @endguest--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}

{{--    <div class="nav-scroller py-1 mb-2">--}}
{{--        <nav class="nav d-flex justify-content-between">--}}
{{--            @foreach($cats as $cat)--}}
{{--                <a class="p-2 link-secondary" href="">ghvhj</a>--}}
{{--                <a class="p-2 link-secondary" href="">kkkk</a>--}}
{{--            <a class="p-2 link-secondary" href="">mmmm</a>--}}
{{--            --}}{{--            @endforeach--}}
{{--        </nav>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<main class="py-4">--}}
{{--    @yield('content')--}}
{{--</main>--}}

{{--<footer class="blog-footer">--}}
{{--    <p>AGROTECH built for <a href="https://github.com/orgs/Youcode-Classe-E-2023-2024">IT-Titans</a> by <a href="#">@mnaouer</a>.</p>--}}
{{--    <p><a href="#">Back to top</a></p>--}}
{{--</footer>--}}

{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
{{--<!-- Bootstrap JavaScript -->--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}

{{--@stack('js')--}}
{{--</body>--}}
{{--</html>--}}
