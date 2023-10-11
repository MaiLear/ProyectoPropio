<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index-@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/admin/principal-page.css')}}">

    @include('admin.layouts.partials.header')
</head>

<body>
    @include('admin.layouts.partials.lateral_menu')
    <main class="container-principal">
        @yield('body')
    </main>
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>