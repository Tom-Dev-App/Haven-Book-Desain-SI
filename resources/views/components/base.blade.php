<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Treaser - Book landing template">
    <meta name="keywords"
        content="Treaser,creative,author,book,ebook,marketing,digital, agency, startup,onepage, clean, modern,business, company">

    <meta name="author" content="dreambuzz">
    <link rel="icon" type="image/png" href="{{ asset('image/havenbook.png') }}">

    <title>The Haven Book | {{ $title ?? '' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('treaser/images/favicon.ico') }}" />
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{ asset('treaser/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('treaser/plugins/animate-css/animate.css') }}">
    <!--  icon Css -->
    <link rel="stylesheet" href="{{ asset('treaser/plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('treaser/plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('treaser/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('treaser/plugins/slick-carousel/slick/slick.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('treaser/plugins/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('treaser/plugins/owl-carousel/owl.theme.default.min.css') }}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('treaser/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('treaser/css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/278b3e3446.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }

        @stack('head')
    </style>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true
        })
    </script>
    <!-- Bootstrap 5 JavaScript -->


</head>


<body id="">

    {{-- CONTENT --}}
    {{ $content }}

    <!--  Footer start -->

    <footer class="footer bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="footer-copy text-white-50 mb-0">
                        &copy; Copyright <span class="current-year">Dreambuzz</span> All rights reserved-2021.
                    </p>
                </div>
                <div class="col-lg-6">
                    {{-- <div class="footer-btm-menu text-lg-right mt-3 mt-lg-0">
                        <img src="{{ asset('treaser/images/about/cards-3.png') }}" alt="" class="img-fluid">
                    </div> --}}
                </div>
            </div> <!-- / .row -->
        </div>
    </footer>

    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{ asset('treaser/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="{{ asset('treaser/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('treaser/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('treaser/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('treaser/plugins/magnific-popup/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('treaser/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <!-- Counter Js -->
    <script src="{{ asset('treaser/plugins/counterup/waypoint.js') }}"></script>
    <script src="{{ asset('treaser/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('treaser/js/contact.js') }}"></script>
    <script src="{{ asset('treaser/js/theme.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap 5 CSS -->
    @stack('scripts')


</body>

</html>
