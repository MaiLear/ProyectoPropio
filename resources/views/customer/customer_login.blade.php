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
        <div class="container-login">
        <h1 class="container-login__title">Trendy</h1>
        <form action="{{route('login.authenticate')}}" method="POST" class="container-login-form">
            @csrf
            <label class="container-login__label" for="email">Email</label>
            <input class="container-login-form__input" type="email"  name="email" placeholder="Enter your email" required >
            <label class="container-login__label" for="password">Password</label>
            <input class="container-login-form__input" type="password" id=password-login name="password" placeholder="Enter your password" required>
            <div class="container-login-form-password">
            <input id="showpassword" type="checkbox" >
            <span>show password</span>
        </div>
            <input class="container-login-form__input container-login-form__input--purple" type="submit" value="Enviar">

            @if(count($errors)>0)
                <ul class="container-login-form-errors">
                    @foreach($errors->all() as $error)
                    <li class="container-login-form-errors__items">{{$error}}</li>
                    @endforeach
                </ul>
            @endif
    
            <a class="container-login-form__link" href="#">Lost your passoword?</a>
            <a class="container-login-form__link" href="{{route('register')}}">Don't have an account? <b>Register</b> </a>
        </form>
    </div>
</main>
@endsection
