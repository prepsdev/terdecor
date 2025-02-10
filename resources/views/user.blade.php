<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Terdecor - {{ $title }}</title>

    <link rel="stylesheet" type="text/css" href="css/vendor.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <!-- Link Bootstrap's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('user/style.css') }}">

    <!-- Google Fonts ================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- script ================================================== -->
    <script src="{{ asset('user/js/modernizr.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        .title {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            font-weight: bold;
            text-align: center;
            text-transform: capitalize;
        }
    </style>
    @stack('styles')
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0">

    <!-- nav bar start  -->
    <header id="nav" class="site-header position-fixed text-dark">
        <nav id="navbar-example2" class="navbar navbar-expand-lg py-2">

            <div class="container ">

                <a class="navbar-brand" href="./index.html"><img src="{{ asset('user/images/logo.png') }}"
                        alt="terdecor.id" style="max-width: 175px;"></a>


                <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2"
                    aria-label="Toggle navigation"><ion-icon name="menu-outline"
                        style="font-size: 30px;"></ion-icon></button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar2"
                    aria-labelledby="offcanvasNavbar2Label">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menu</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav align-items-center justify-content-end align-items-center flex-grow-1 ">
                            <li class="nav-item">
                                <a class="nav-link active me-md-4" href="#billboard">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-md-4" href="#portfolio">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-md-4" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link me-md-4" href="#testimoni">Testimoni</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn-medium btn btn-primary"
                                    href="https://wa.me/6281224377189?text=Aku%20mau%20tanya" target="_blank">Hubungi
                                    Kami</a>
                            </li>
                        </ul>

                    </div>
                </div>


            </div>
        </nav>
    </header>

    @yield('content')

    <section id="footer">
        <div class="container footer-container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center border-top"></footer>

            <div class="container">
                <footer class="d-flex flex-wrap justify-content-between align-items-center pt-4 pb-2">
                    <div class="col-md-8 order-md-1">
                        <p class="fw-bold">
                            PT Tera Global Karya
                        </p>

                        <p>
                            Jl Pendidikan Blok A No 14
                            <br>
                            Cinangka, Sawangan, Depok, Jawa Barat
                        </p>
                        <p class="fw-bold">©2024 terdecor.id</p>
                    </div>
                    <div class="col-md-4 d-flex align-items-end order-md-2 mt-auto">
                        <p>
                            <i class="bi-facebook pe-4"></i>
                            <a href="https://www.instagram.com/terdecor.id/"><i class="bi-instagram pe-4"></i></a>
                            <i class="bi-twitter pe-4"></i>
                            <i class="bi-youtube pe-4"></i>
                        </p>
                    </div>
                </footer>
            </div>
    </section>


    @stack('scripts')
</body>

</html>
