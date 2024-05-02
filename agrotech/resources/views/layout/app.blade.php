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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{asset('css/pagination.css')}}" rel="stylesheet" type="text/css">
    @stack('css')



</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="{{route('home')}}" class="navbar-brand">
                    <h1 class="text-primary display-6">AgroTech</h1>
                </a>
                {{-- <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"--}}
                {{-- data-bs-target="#navbarCollapse">--}}
                {{-- <span class="fa fa-bars text-primary"></span>--}}
                {{-- </button>--}}
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <div class="position-relative mx-auto">
                            <form class="form" action="{{ route('searchArticle') }}" method="POST">
                                @csrf
                                <input class="form-control border-2 border-secondary w-100 py-1 px-3 rounded-pill" type="search" name="search" placeholder="Search">
                                <button type="submit" class="btn btn-primary border-2 border-secondary py-1 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 0%;"><i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <a href="{{route('article')}}" class="nav-item nav-link">Articles</a>

                    @auth
                        <a href="{{route('create.article')}}" class="nav-item nav-link">Create Article</a>
                        <a href="{{route('favorite')}}" class="nav-item nav-link">Favoris</a>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/profile">Profile</a>
                            <a href="{{ route('logout') }}">
                                <span class="dropdown-item">Logout</span>
                            </a>
                        </div>
                    </div>
                    @else
                    <a href="{{route('login')}}" class="nav-item nav-link">Sign in</a>
                    @endauth
                </div>
            </nav>
        </div>

        <!-- categories -->
        <div class="col-lg-12">
            <nav class="nav d-flex justify-content-between">
                @foreach(\App\Models\Category::all() as $cat)
                <a class="d-flex justify-content-center align-items-center m-2 py-2 bg-light rounded-pill active text-dark" data-bs-toggle="pill" style="width: 130px;" href="{{ route('article.filter', ['id' => $cat->id]) }}">{{ $cat->name }}</a>
                @endforeach
            </nav>
        </div>
        <!-- end categories -->

    </div>
    <!-- Navbar End -->

    <body class="text-center">

        @yield('content')
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer">
            <div class="container py-5">
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
                                    <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="email" name="email" placeholder="Your Email">
                                    <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>AGROTECH</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        <p>AGROTECH built for <a href="https://github.com/orgs/Youcode-Classe-E-2023-2024">IT-Titans</a> by <a href="#">@mnaouer</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
        <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    @stack('js')

</html>
