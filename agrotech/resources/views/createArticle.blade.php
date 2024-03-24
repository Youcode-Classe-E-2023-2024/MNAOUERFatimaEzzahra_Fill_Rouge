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
                        <input class="form-control border-2 border-secondary w-100 py-3 px-4 rounded-pill" type="search"
                               placeholder="Search">
                        <button type="submit"
                                class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                                style="top: 0; right: 0%;"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a href="{{route('create.article')}}" class="nav-item nav-link">Create Article</a>
                <a href="{{route('login')}}" class="nav-item nav-link">Sign in</a>
            </div>
    </div>
    </nav>

    <!-- categories -->
    <div class="col-lg-12">
        <ul class="nav nav-pills d-inline-flex text-center mb-5">
            <li class="nav-item">
                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                    <span class="text-dark" style="width: 130px;">All Article</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                    <span class="text-dark" style="width: 130px;">Cultive</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                    <span class="text-dark" style="width: 130px;">Météo</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                    <span class="text-dark" style="width: 130px;">Maladie</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                    <span class="text-dark" style="width: 130px;">Fértilisation</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                    <span class="text-dark" style="width: 130px;">Irrigation</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                    <span class="text-dark" style="width: 130px;">Matériel</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                    <span class="text-dark" style="width: 130px;">Arbre</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- end categories -->

</div>
<!-- Navbar End -->

<main class="container pt-4">
    <h1 class="display-2">********</h1>
    <h1 class="display-2">*****</h1>

    <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-dark text-center">Article Creation</h2>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <label for="inputCategory">Category</label>
                        <select name="category" id="inputCategory" class="form-control" required>
                                <option value="">cat</option>
                        </select>
                    </div>

                    <div class="form-group mb-6">
                        <label for="title">Title</label>
                        <input name="title" class="form-control is-invalid" id="title" placeholder="Title event" required>

                        <span class="invalid-feedback" role="alert">
                                <strong>nn</strong></span>
                    </div>

                    <div class="form-group mb-2">
                        <label for="desc">Description</label>
                        <textarea name="description" class="form-control is-invalid" id="desc" placeholder="Description event" required></textarea>

                        <span class="invalid-feedback" role="alert">
                                <strong>nn</strong>
                            </span>
                    </div>

                    <div class="form-group mb-2">
                        <label for="picture">Cover</label>
                        <input type="file" accept="image/*" name="picture" class="form-control is-invalid" id="picture" required/>

                        <span class="invalid-feedback" role="alert">
                                <strong>nn</strong>
                            </span>
                    </div>

                    <button type="submit" class="btn btn-secondary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0">AgroTech</h1>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number"
                                   placeholder="Your Email">
                            <button type="submit"
                                    class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white"
                                    style="top: 0; right: 0;">Subscribe Now
                            </button>
                        </div>
                    </div>
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
                    <p>AGROTECH built for <a href="https://github.com/orgs/Youcode-Classe-E-2023-2024">IT-Titans</a> by <a href="#">@mnaouer</a>.</p>
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

    </html>
