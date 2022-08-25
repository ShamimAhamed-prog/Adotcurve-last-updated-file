<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- Favicon
  ================================================== -->
    <link rel="icon" type="image/png" href="">

    <!-- CSS
  ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/bootstrap/bootstrap.min.css')}}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome/css/blog.css')}}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/animate-css/animate.css')}}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/slick/slick-theme.css')}}">

    <!-- Colorbox -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/colorbox/colorbox.css')}}">

    <!-- Template styles-->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">


</head>
<body>
<div class="body-inner">
    <header id="header" class="header-one">

        @include('frontend.include.header')
        @include('frontend.include.menu')

    </header>


@yield('slider')


@yield('requestQuote')

@yield('body')



@include('frontend.include.footer')

<!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="{{asset('frontend/plugins/jQuery/jquery.min.js')}}"></script>
    <!-- Bootstrap jQuery -->
    <script src="{{asset('frontend/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Slick Carousel -->
    <script src="{{asset('frontend/plugins/slick/slick.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/slick/slick-animation.min.js')}}"></script>
    <!-- Color box -->
    <script src="{{asset('frontend/plugins/colorbox/jquery.colorbox.js')}}"></script>

    <!-- shuffle -->
    <script src="{{asset('frontend/plugins/shuffle/shuffle.min.js')}}" defer></script>

    <!-- Google Map API Key-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <!-- Google Map Plugin-->
    <script src="{{asset('frontend/plugins/google-map/map.js')}}" defer></script>

    <!-- Template custom -->
    <script src="{{asset('frontend/js/script.js')}}"></script>

</div><!-- Body inner end -->
</body>
</html>
