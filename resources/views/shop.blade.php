@extends('layouts.layout')
@section('title','SHOP')

@section('body')

<body>
    <main class="conteiner-shop">
        <h1 class="conteiner-shop__title">Feactured Products</h1>
        <p class="conteiner-shop__title conteiner-shop__title--light">Summer Collection New Morden Design</p>
        <section class="conteiner-shop-products" data-products="{{ json_encode($data) }}" data-news="{{ json_encode($newProducts) }}">

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
            <div class="conteiner-content-shop-publicity">
                <div class="conteiner-content-shop-publicity-card">
                    <p class="conteiner-content-shop-publicity-card__textbeforetitle">crazy deals</p>
                    <h1 class="conteiner-content-shop-publicity-card__title">buy 1 get 1 free</h1>
                    <p class="conteiner-content-shop-publicity-card__paragraph">The best classics dress is on sale at cara</p>
                    <button class="conteiner-content-shop-publicity-card__btn">Learn More</button>
                </div>
                <div class="conteiner-content-shop-publicity-card conteiner-content-shop-publicity-card--green">
                    <h6 class="conteiner-content-shop-publicity-card__textbeforetitle">Spring/summer</h6>
                    <h1 class="conteiner-content-shop-publicity-card__title">Upcomming season</h1>
                    <p class="conteiner-content-shop-publicity-card__paragraph">The best classics dress is on sale at cara</p>
                    <button class="conteiner-content-shop-publicity-card__btn conteiner-content-shop-publicity-card__btn--transparent">Collection</button>
                </div>
            </div>

            <div class="conteiner-shop-publicity-smallcard">
                <div class="conteiner-content-shop-publicity-smallcard-card conteiner-content-shop-publicity-smallcard-card--green">
                    <h1 class="conteiner-content-shop-publicity-smallcard-card__title">Upcomming season</h1>
                    <h3 class="conteiner-content-shop-publicity-smallcard-card__subtitle">Spring / Summer 2022</h3>
                </div>

                <div class="conteiner-content-shop-publicity-smallcard-card conteiner-content-shop-publicity-smallcard-card--white">
                    <h1 class="conteiner-content-shop-publicity-smallcard-card__title">Upcomming season</h1>
                    <h3 class="conteiner-content-shop-publicity-smallcard-card__subtitle">Spring / Summer 2022</h3>
                </div>

                <div class="conteiner-content-shop-publicity-smallcard-card conteiner-content-shop-publicity-smallcard-card--purple">
                    <h1 class="conteiner-content-shop-publicity-smallcard-card__title">Upcomming season</h1>
                    <h3 class="conteiner-content-shop-publicity-smallcard-card__subtitle">Spring / Summer 2022</h3>
                </div>
            </div>
        </section>
    </main>
    <template id="template-conteiner-content-shop-publicity">

    </template>
    <template id="template-conteiner-shop-products">
        <div class="conteiner-shop-products-cards">
            <div class="conteiner-shop-products-cards-content">
                <div class="conteiner-shop-products-cards-content-picture">
                    <img class="conteiner-shop-products-cards__img" src="">
                </div>
                <p class="conteiner-shop__title--light"></p>
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