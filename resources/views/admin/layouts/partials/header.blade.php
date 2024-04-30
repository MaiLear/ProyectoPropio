<nav class="container-menu-top">
    <form id="search-input-products" action="{{$routeSearchInput}}" class="w-75 ms-3" method="get">
        <div class="input-group">
            <button class="input-group-text"><img src="{{asset('img/lupa.png')}}"  alt="lupa"></button>
            <input type="text" name="search" class="form-control " placeholder="Search">

        </div>
        

    </form>

    <div class="dropdown me-3" style="align-self: center;">
        <button class="btn btn-dark" data-bs-toggle="dropdown">{{ucfirst($admin['first_name']).' '.ucfirst($admin['second_name'])}}</button>

        <ul class="dropdown-menu">
            <li class="dropdown-header">Opciones de  usuario</li>
            <li class="dropdown-item"><a href="{{route('admin.logout')}}">Cerrar sesión</a></li>
        </ul>
    </div>
   
    <div class="container-menu-top-select">
        <div class="container-menu-top-user-info">
            <a href="" class="container-menu-top-user-info__link">Configuration</a>
        </div>
        <div class="container-menu-top-user-info">
            <a href="" class="container-menu-top-user-info__link">Contact us</a>
        </div>
        <div class="container-menu-top-user-info">
            <a href="{{route('admin.logout')}}" class="container-menu-top-user-info__link">Logout</a>
        </div>
    </div>
</nav>