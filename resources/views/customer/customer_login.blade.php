@extends('layouts.customer_layout')

@section('title', 'container-login')

@section('customer_layout__styles')
<style>
    body{
    height: 100vh;
    background: url('/img/pexels-simon-berger-1323550.jpg');
    background-size: 100% 100%;
    background-position: center;
    }
    </style>
@endsection

@section('body')
<main class="container">
       <x-formLogin routeForm="{{route('customer.authenticate')}}" routeRegister="{{route('customer.create')}}" titleLogin="Trendy"/> 
</main>
@endsection
