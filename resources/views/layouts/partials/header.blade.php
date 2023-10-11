<nav class="main-menu">
        <picture>
            <source srcset="{{asset('img/logoImg.png')}}" media="(max-width:1500px)">
            <img class="main-menu__logo" src="{{asset('img/logoImg.png')}}">
        </picture>
        <ul class="main-menu__list">
            <li class="main-menu-list__item"><a href="{{route('home')}}" class="main-menu-list__link">Home</a></li>
            <li class="main-menu-list__item"><a href="{{route('customer.shop')}}" class="main-menu-list__link">Shop</a></li>
            <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Blog</a></li>
            <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">About</a></li>
            <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Contact</a></li>
            <li class="main-menu-list__item"><a href="#" class="main-menu-list__link"><img src="{{asset('img/icons8-bolsa-de-compras-25.png')}}"></a></li>
        </ul>
    </nav>