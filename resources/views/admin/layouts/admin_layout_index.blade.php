<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index-@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/admin/principal-page.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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