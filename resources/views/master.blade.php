<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Bakery Shop">
    <meta name="keywords" content="Bakery Shop, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Bakery Shop</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app_css.css')}}" type="text/css">
    <link rel="stylesheet" href="{{mix('css/style.css')}}" type="text/css">
</head>
<body>

    @include('headers.header_nav')

    @yield('content')

    @include('footers.footer')

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/template_main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>