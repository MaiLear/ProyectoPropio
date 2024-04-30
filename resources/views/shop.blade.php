@extends('layouts.layout')
@section('title','SHOP')

@section('body')


@include('layouts.partials.main_shop')

<x-templateShopCart>
<div class="template-cart__id row">
<small class="template-cart__brand">Nuevo</small>
        <div>
            <img class="template-cart__img" src="">
            <div class="template-cart__textcontent">
                <h6 class="template-cart__name">Vero eum qui</h6>
                <span class="template-cart__quantity">cantidad</span>
                <h5 class="template-cart_price">Us$ 99.99</h5>
            </div>
        </div>
    </div>
    
</x-templateShopCart>



@endsection


@push('js')
@isset($customerToken)
<script>
    window.localStorage.setItem('customerToken',"{{$customerToken}}");
</script>
@endisset
<script type="module" src="{{asset('js/shop/shop.js') }}"></script>
@endpush