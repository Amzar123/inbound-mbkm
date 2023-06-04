<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/logo-upi.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/logo-upi.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ setting('meta_description') }}">
    <meta name="keyword" content="{{ setting('meta_keyword') }}">

    @include('frontend.includes.meta')

    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{asset('img/logo-upi.png')}}">
    <link rel="icon" type="image/ico" href="{{asset('img/logo-upi.png')}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('before-styles')

    <link rel="stylesheet" href="{{ mix('css/frontend.css') }}">

    <!-- Custom CSS -->
    <link rel="icon" href="https://www.upi.edu/favicon.ico" type="image/x-icon">
    <link href="https://www.upi.edu/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="google-site-verification" content="hrI9M_lTsEHbpu9HEikk8l7pHONG88ZonuaxYN2wgVo" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://www.upi.edu/css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.upi.edu/css/bootstrap.min.css">

    <!-- Owlcarousel CSS -->
    <link rel="stylesheet" href="https://www.upi.edu/owlcarousel/css/owl.carousel.css">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://www.upi.edu/dist/jquery.fancybox.min.css">

    <!-- Fontawesome -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.upi.edu/fontawesome/css/all.css">

    @stack('after-styles')

    <x-google-analytics />
</head>

<body>

    @include('frontend.includes.header')
    <main>
        @yield('content')
    </main>

    @include('frontend.includes.footer')

</body>

<!-- Scripts -->
@stack('before-scripts')

<script src="{{ mix('js/frontend.js') }}"></script>

@stack('after-scripts')

</html>