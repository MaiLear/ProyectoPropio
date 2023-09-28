<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}">

    <nav class="main-menu">
        <picture>
         <source srcset="{{asset('img/1-removebg-preview-small-105w.png')}}" media="(max-width:1500px)">
         <img class="main-menu__logo" src="{{asset('img/1-removebg-preview-500w.png')}}">
        </picture>
         <ul class="main-menu__list">
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Home</a></li>
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Shop</a></li>
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Blog</a></li>
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">About</a></li>
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link">Contact</a></li>
             <li class="main-menu-list__item"><a href="#" class="main-menu-list__link"><img src="{{asset("img/icons8-bolsa-de-compras-25.png")}}"></a></li>
         </ul>
     </nav>
</head>
<body>
<main class="page-content">
    <img class="page-content-img" src="{{asset('img/modelo.png')}}" alt="img-modelo">
<div class="page-content-texts">
    <h3 class="page-content-texts__title--small">Trade-in-offer</h3>
    <h1 class="page-content-texts__title">Super value deals</h1>
    <h1 class="page-content-texts__title page-content-texts__title--green">On all products</h1>
    <p class="page-content-texts__paragraph">Save more with coupons & up to 70% off! </p>
    <br>
    <button class="page-content-texts__btn">Shop Now</button>
</div>
</main>
</body>
</html>





