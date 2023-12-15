@extends('layouts.customer_layout')

@section('title', 'container-login')

@section('style')
<link rel="stylesheet" href="{{asset('css/customer/style.css')}}">
@endsection

@section('body')
<x-formLogin routeForm="{{route('customer.authenticate')}}" routeRegister="{{route('customer.create')}}" titleLogin="Trendy"  routeForgotPassword="{{route('customer.forgotpassword')}}">
    <x-slot name="dataCart">
        <input type="hidden" id="inputDataCart" name="dataCart">
    </x-slot></x-formLogin>

@endsection