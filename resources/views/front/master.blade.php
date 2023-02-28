<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('/')}}front-assets/images/favicon.png" type="">
    <title>Famms - @yield('title')</title>
    @include('front.includes.style')
</head>
<body>

@include('front.includes.header')
@yield('body')
<!-- footer start -->
@include('front.includes.footer')

@include('front.includes.script')

</body>
</html>

