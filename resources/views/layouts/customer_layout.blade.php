<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('style')
    <title>@yield('title')</title>
</head>

<body>
    @yield('customer_layout__styles')
    <img class="logo" src="{{asset('img/logoImg.png')}}">
    @yield('body')
    <script src='{{asset('js/login.js')}}'></script>  
    <script src='{{asset('js/main.js')}}'></script>  
</body>
</html>