@extends('layouts.customer_layout')

@section('title', 'Customer Login')

@section('style')
<link rel="stylesheet" href="{{asset('css/customer/style.css')}}">
@endsection

@section('body')
@if(session('msg'))
<h1>{{session('msg')}}</h1>
@endif
<x-formLogin routeForm="{{route('customer.authenticate')}}" routeRegister="{{route('customer.create')}}" titleLogin="Trendy"  routeForgotPassword="{{route('customer.forgotpassword')}}" id="form-customer">
    <x-slot name="dataCart">
        <input type="hidden"  name="product_id">
        <input type="hidden"  name="quantity">
        <input type="hidden"  name="price">
    </x-slot></x-formLogin>

@endsection