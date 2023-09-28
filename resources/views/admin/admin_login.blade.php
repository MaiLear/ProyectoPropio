@extends('layouts.admin_layout')
@section('title', 'ADMIN LOGIN')

@section('body')
    <div class="login">
    <h1 class="login__title">Login</h1>
    <form action="{{route('admin.authenticate')}}" method="POST" class="login-form">
        @csrf
        <label class="login__label" for="email">Email</label>
        <input class="login-form__input" type="email"  name="email" placeholder="Enter your email" required >
        <label class="login__label" for="password">Password</label>
        <input class="login-form__input" type="password" id=password-login name="password" placeholder="Enter your password" required>
        <div class="login-form-password">
        <input id="showpassword" type="checkbox" >
        <label  for="checkpassword">show password</label>
    </div>
        <input class="login-form__input login-form__input--purple" type="submit" value="Enviar">
        
        @if(count($errors)>0)
                <ul class="login-form-errors">
                    @foreach($errors->all() as $error)
                        <li class="login-form-errors__items">{{$error}}</li>
                    @endforeach
                </ul>    
        @endif

        <a class="login-form__link" href="#">Lost your passoword?</a>
        <a class="login-form__link" href="{{route('admin.create')}}">Don't have an account? <b>Register</b> </a>
    </form>
</div>
    @endsection