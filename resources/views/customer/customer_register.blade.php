@extends('layouts.customer_layout')
@section('title', 'Register')

@section('body')
<div class="content">
    <div class="content-img"></div>
    <form action="{{route('register.store')}}" method="POST" class="content-form">
        @csrf
        <h1 class="content-form__title">Sign in</h1>
        @if(isset($data))
        <h2 class="content-form__response register__message">{{$data['msg']}}</h2>
        @endif
        <label class="content-form__label" for="first_name">First name<br>
            <input class="content-form__input" type="text" name="first_name" id="first_name" placeholder="Enter your first name" value="{{old('first_name')}}">
        </label>
        <label class="content-form__label" for="second_name">Second name<br>
            <input class="content-form__input" type="text" name="second_name" id="second_name" placeholder="Enter your second name" value="{{old('second_name')}}">
        </label>
        <label class="content-form__label" for="last_name">Last name<br>
            <input class="content-form__input" type="text" name="last_name" id="last_name" placeholder="Enter your last name" value="{{old('last_name')}}">
        </label>
        <label class="content-form__label" for="email">Email<br>
            <input class="content-form__input" type="email" name="email" id="email" placeholder="Enter your email" value="{{old('email')}}">
        </label>
        <label class="content-form__label" for="password">Password<br>
            <input class="content-form__input" type="password" name="password" id="password" placeholder="Enter your password">
        </label>
        @if(count($errors)>0)
        <ul class="content-form-errors">
            @foreach($errors->all() as $error)
            <li class="content-form-errors__items">{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <input type="submit" class="content-form__input content-form__input--purple" value="Send">
        <a class="content-form__link" href="{{route('login')}}">Log in</a>
    </form>
</div>
@endsection