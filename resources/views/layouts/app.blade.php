<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GRH') }}</title>

    <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

</head>
<body>


            @yield('content')


    <!--===============================================================================================-->
	<script src="{{ asset('vendor/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('vendor/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ asset('vendor/vendor/main.js') }}"></script>
</body>
</html>
