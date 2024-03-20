<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ !empty($meta_title) ? $meta_title : '' }}</title>

    @if(!empty($meta_description))
    <meta name="description" content="{{ $meta_description }}">
    @endif

    @if(!empty($meta_keywords))
    <meta name="keywords" content="{{ $meta_keywords }}">
    @endif

    <link rel="shortcut icon" href="{{ url('styles/images/icons/android-chrome-512x512.png') }}">
    <link rel="stylesheet" href="{{ url('styles/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('styles/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('styles/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('styles/css/style.css') }}">

    


    @yield('style')
</head>

<body>
    <div class="page-wrapper">


        @include('layouts._header')


        @yield('content')


        @include('layouts._footer')



    </div>
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>


    <div class="mobile-menu-overlay"></div>

    @include('layouts._mobile_menu')


    <!-- Plugins JS File -->
    <script src="{{ url('styles/js/jquery.min.js') }}"></script>
    <script src="{{ url('styles/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('styles/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ url('styles/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('styles/js/superfish.min.js') }}"></script>
    <script src="{{ url('styles/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('styles/js/jquery.magnific-popup.min.js') }}"></script>
    @yield('script')
    <!-- Main JS File -->
    <script src="{{ url('styles/js/main.js') }}"></script>


</body>

</html>
