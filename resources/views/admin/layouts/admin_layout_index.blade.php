<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index-@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/admin/principal-page.css')}}">

<nav class="container-menu-top">
<form class="container-menu-top-widgetsearch" method="get">
        <input type="text" name="search" class="container-menu-top-widgetsearch__input" placeholder="Search">
        <button class="container-menu-top-widgetsearch__btn" type="submit"><img class="container-menu-top-widgetsearch__icon" src="{{asset('img/lupa.png')}}"></button>
        
    </form>

    <div class="container-menu-top-user">
        <div class="container-menu-top-user-info">
            <div class="container-menu-top-user-info-image"></div>
                <h4 class="container-menu-top-user-info__text">Nombre del usuario</h4>
                <img class="container-menu-top-user-info__icon" src="{{asset('img/lupa.png')}}">
        </div>
    </div>
    <div class="container-menu-top-select">  
        <div class="container-menu-top-user-info">
            <a href="" class="container-menu-top-user-info__link">Configuration</a>
        </div>
        <div class="container-menu-top-user-info">
            <a href="" class="container-menu-top-user-info__link">Contact us</a>
        </div>
    </div>
</nav>
</head>
<body>
    <div class="lateral-menu">
        <div class="lateral-menu-header">
            <div class="lateral-menu-header__img"></div>
            <h1 class="lateral-menu-header__text">Administrador</h1>
        </div>
        <ul class="lateral-menu-options">
            <li class="lateral-menu-options__items"><a class="lateral-menu-options__links" href="{{route('admin.index')}}">Index</a></li>
            <li class="lateral-menu-options__items"><a class="lateral-menu-options__links" href="{{route('admin.products.index')}}">Products</a></li>
            <li class="lateral-menu-options__items"><a class="lateral-menu-options__links" href="">Customers</a></li>
        </ul>
    </div>
<main class="container-principal">
    @yield('body')
</main>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>