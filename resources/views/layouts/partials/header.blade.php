<nav class="main-menu">
        <picture>
            <source srcset="{{asset('img/logoImg.png')}}" media="(max-width:1500px)">
            <img class="main-menu__logo" src="{{asset('img/logoImg.png')}}">
        </picture>
        <ul class="main-menu__list position-relative">
            <li class="main-menu-list__item"><a href="{{route('home')}}" class="main-menu-list__link">Home</a></li>
            <li class="main-menu-list__item"><a href="{{route('customer.shop')}}" class="main-menu-list__link">Shop</a></li>
            <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Blog</a></li>
            <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">About</a></li>
            <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Contact</a></li>
            <li id="shoppingcard" class="main-menu-list__item"><a href="#" class="main-menu-list__link">
                <img class="main-menu-list__icon" src="{{asset('img/icons8-bolsa-de-compras-25.png')}}"></a>
                <div id="shoppingcartnotification" class="bg-danger rounded-pill position-absolute text-center text-light" style="top: -10px; right: 21px; width:18px">.</div>
        </li>
        <li id="shoppingcartcard" class="position-absolute d-none" style="right: 100px;">
        <div id="card-shopping-cart" class="card" style="width: 20rem;">
              <div class="container-fluid">
                  <div class="card-footer">
                      <h1>Total:<span>Us$ 199.98</span></h1>
                      <button class="btn btn-success">Ir al carrito</button>
                  </div>
              </div>
    </div>
        </li>
        </ul>
    </nav>

    