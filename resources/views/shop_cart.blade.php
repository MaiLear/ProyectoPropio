@extends('layouts.layout')
@section('title','SHOP')

@section('body')

<div class="me-5" style="float: right">
    <a id="buy__btn" class="btn btn-info mt-5 my-auto btn-lg" href="{{route('customer.login')}}">Comprar</a>
</div>
<div id="container-products-cart" class="container">

</div>


<x-templateShopCart>
    <div class="template-cart__id card my-5 w-75">
        <div class="card-body">
            <div class="row row-cols-2">
                <div>
                    <img class="template-cart__img img-fluid" src="">
                </div>
                <div class="">
                    <h4 class="mb-0">Product name</h4>
                    <small class="template-cart__brand text-secondary "></small>
                    <p class="template-cart__name"></p>

                    <h4>Total</h4>
                    <p class="template-cart_price"></p>
                    <h4>Cantidad</h4>
                    <div class="btn-group">
                        <button id="quantity-increment__btn" class="btn btn-primary">+</button>
                        <button disabled class="template-cart__quantity btn"></button>
                        <button id="quantity-decrement__btn" class="btn btn-danger">-</button>
                    </div>
                    <br>
                </div>
            </div>
        </div>

    </div>
</x-templateShopCart>
@endsection


@push('js')
<script src="{{asset('js/shop/shop_cart.js')}}" type="module"></script>
@endpush