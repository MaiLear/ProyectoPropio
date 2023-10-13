<nav class="container-menu-top">
    <form class="container-menu-top-widgetsearch" method="get">
        <input type="text" name="search" class="container-menu-top-widgetsearch__input" placeholder="Search">
        <button class="container-menu-top-widgetsearch__btn" type="submit"><img class="container-menu-top-widgetsearch__icon" src="{{asset('img/lupa.png')}}"></button>

    </form>

    <div class="container-menu-top-user">
        <div class="container-menu-top-user-info">
            <div class="container-menu-top-user-info-image"></div>
            <h4 class="container-menu-top-user-info__text">{{$userAdmin->first_name.' '.$userAdmin->second_name}}</h4>
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
        <div class="container-menu-top-user-info">
            <a href="{{route('admin.logout')}}" class="container-menu-top-user-info__link">Logout</a>
        </div>
    </div>
</nav>