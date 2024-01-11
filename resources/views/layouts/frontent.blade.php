<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Hospitle')</title>
    <link rel="stylesheet" href="{{ asset("../assets/css/maicons.css") }}">
    <link rel="stylesheet" href="{{ asset("../assets/css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("../assets/vendor/owl-carousel/css/owl.carousel.css") }}">
    <link rel="stylesheet" href="{{ asset("../assets/vendor/animate/animate.css") }}">
    <link rel="stylesheet" href="{{ asset("../assets/css/theme.css") }}">
</head>
<style>
    .sticky-navbar {
        position: sticky;
        top: 0;
        background-color: white;
        width: 100%;
        z-index: 1000;
    }
</style>
<body>
    <div class="back-to-top"></div>
    <header class="content">
        @include('layouts.frontend.navbar')
    </header>
    @yield('content')
    @include('layouts.frontend.footer')
</body>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="../assets/js/theme.js"></script>
<script src="https://maps.app.goo.gl/K8Kz3qUXvJgnk2EK6"></script>
</html>
