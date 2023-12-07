<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Secure Notes</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../template/img/favicon.png" rel="icon">
    <link href="../template/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../landing_template/vendor/aos/aos.css" rel="stylesheet">
    <link href="../landing_template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../landing_template/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../landing_template/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../landing_template/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../landing_template/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../landing_template/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a href="index.html">Secure Notes</a></h1>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    @if (Auth::user())
                        <li><a class="nav-link scrollto" href="/dashboard">Dashboard</a></li>
                    @else
                        <li><a class="nav-link scrollto" href="/login">Login</a></li>
                        <li><a class="nav-link scrollto " href="/register">Register</a></li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <div>
                        <h1>Selamat datang di Secure Notes</h1>
                        <h2>Project mata kuliah keamanan sistem komputer IF7B</h2>
                        <a href="/dashboard" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="../landing_template/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container">
            <div class="copyright">
                &copy; <strong><span>Secure Notes</span></strong> 2023
            </div>
            {{-- <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div> --}}
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../landing_template/vendor/aos/aos.js"></script>
    <script src="../landing_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../landing_template/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../landing_template/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../landing_template/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../landing_template/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../landing_template/js/main.js"></script>

</body>

</html>
