@extends('layouts.customer_layout')
@section('title', 'Customer Register')

@section('style')
<link rel="stylesheet" href="{{asset('css/customer/register.css')}}">
@endsection

@section('body')
<x-formRegister routeLogin="{{route('customer.login')}}" routeSaveData="{{route('customer.store')}}">
    <x-slot name="divImage">
        <div class="container-register-img"></div>
    </x-slot>

    <x-slot name="lastnameInput">
        <label class="container-register-form__label" for="last_name">Last name<br>
            <input class="container-register-form__input" type="text" name="last_name" id="last_name" placeholder="Enter your last name" value="{{old('last_name')}}">
        </label>
    </x-slot>
</x-formRegister>
@endsection