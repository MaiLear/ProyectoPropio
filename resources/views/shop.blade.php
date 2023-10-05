@extends('layouts.layout')
@section('title','SHOP')

@section('body')

<body>
    <main class="conteiner-shop">
        <h1 class="conteiner-shop__title">Feactured Products</h1>
        <p class="conteiner-shop__title conteiner-shop__title--light">Summer Collection New Morden Design</p>
        <section class="conteiner-shop-products" data-products="{{ json_encode($data) }}">

        </section>
        <div class="conteiner-shop-img-offert">
            <div class="conteiner-shop-img-offert-content">
                <p class="conteiner-shop-img-offert-content__text">Repair Services</p>
                <h1 class="conteiner-shop-img-offert-content__text">Up to <span class="conteiner-shop-img-offert-content__text--red">70% Off</span>-All t-Shirts & Accesories</h1>
                <button class="conteiner-shop-img__btn">Explore More</button>
            </div>
        </div>
        <h1 class="conteiner-shop__title conteiner-shop__title--center">New Arrivals</h1>
        <p class="conteiner-shop__title conteiner-shop__title--light">Summer Collection New Morden Design</p>
        <section class="conteiner-shop-newproducts">

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
                <div class="conteiner-shop-products-cards-content-picture">
                    <img class="conteiner-shop-products-cards__img" src="">
                </div>
                <p class="conteiner-shop__title--light">adidas</p>
                <h3 class="conteiner-shop-products-cards__data"></h3>
                <div class="conteiner-shop-products-cards-lasttext">
                    <h3 class="conteiner-shop-products-cards__data conteiner-shop-products-cards__data--green"></h3>
                    <div class="conteiner-shop-products-cards-icon">
                        <img class="conteiner-shop-products-cards-icon__img" src="{{asset('img/carrito.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </template>
    @endsection