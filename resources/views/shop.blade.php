@extends('layouts.layout')
@section('title','SHOP')

@section('body')
<body>
   <main class="conteiner-shop">
    <h1 class="conteiner-shop__title">Feactured Products</h1>
    <p class="conteiner-shop__title conteiner-shop__title--light">Summer Collection New Morden Design</p>
    <section class="conteiner-shop-products">

    </section>
    <div class="conteiner-shop-img-offert">
        <p class="conteiner-shop-img-offert__text">Repair Services</p>
        <h1 class="conteiner-shop-img-offert__text">Up to <span class="conteiner-shop-img-offert__text--red">70% Off</span>-All t-Shirts & Accesories</h1>
        <button class="conteiner-shop-img__btn">Explore More</button>
    </div>
    <section class="conteiner-shop-newproducts">
        <h1 class="conteiner-shop__title">New Arrivals</h1>
        <p class="conteiner-shop__title conteiner-shop__title--light">Summer Collection New Morden Design</p>
    </section>
    <section class="conteiner-shop-publicity">

    </section>
    </main> 
    <template id="template-conteiner-shop-publicity">
        <div class="conteiner-shop-publicity__img">
            <p class="conteiner-shop__title"></p>
            <h3 class="conteiner-shop__title"></h3>
            <p class="conteiner-shop__title"></p>
            <button class="conteiner-shop-img__btn"></button>
        </div>
    </template>
    <template id="template-conteiner-shop-products">
        <div class="conteiner-shop-products-cards">
            <div class="conteiner-shop-products-cards-content">
            <img class="conteiner-shop-products-cards__img" src="">
            <p class="conteiner-shop__title--light"></p>
            <h3 class="conteiner-shop-products-cards__data"></h3>
            <h3 class="conteiner-shop-products-cards__data conteiner-shop-products-cards__data--green">$78</h3>
            <div class="conteiner-shop-products-cards__icon">
            <img src="{{asset('img/icons8-carrito-de-compras-48.png')}}">
        </div>
        </div>
        </div>
    </template>
    @endsection