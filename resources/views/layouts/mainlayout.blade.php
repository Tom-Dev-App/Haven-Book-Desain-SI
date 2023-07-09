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

    <title>The Haven Book | @yield('title')</title>

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

</head>


<body id="top-header">
    <!-- Navigation Menu -->
    @yield('content')
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

</body>

</html>
