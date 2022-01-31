<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    <!-- CSS Styles -->

    <link rel="stylesheet" href="{{asset('client/assets/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/plugins/aos-master/dist/aos.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/plugins/hover-master/css/hover-min.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/droopmenu.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/highlight.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/assets/css/style.css')}}">
    <!-- /CSS Styles -->
    @yield('links')
</head>
<body>
<!-- Header And Navbar -->

@include('client.partials.navbar')

<!-- /Header And Navbar-->

@yield('content')

<!-- Footer -->
@include('client.partials.footer')
<!-- /Footer -->

<!-- Copyright -->
@include('client.partials.copyright')
<!-- Copyright -->

<!-- Scripts -->
<script src="{{asset('client/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('client/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('client/assets/plugins/fontawesome/js/all.min.js')}}"></script>
<script src="{{asset('client/assets/plugins/aos-master/dist/aos.js')}}"></script>
<script src="{{asset('client/assets/js/droopmenu.js')}}"></script>
<script src="{{asset('client/assets/js/nouislider.min.js')}}"></script>
<script src="{{asset('client/assets/js/pagination.js')}}"></script>
<script src="{{asset('client/assets/js/scripts.js')}}"></script>
@yield('scripts')
<!-- /Scripts -->
</body>
</html>
