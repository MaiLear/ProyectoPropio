@extends('layouts.admin_layout')
@section('title', 'ADMIN REGISTER')

@section('body')
    <div class="register">
        <h1 class="register__title">Register</h1>
        @if (isset($data))
            <h3 class="register__message">{{$data['msg']}}</h3>
        @endif
        {{-- @if (session('message'))
            <h3 class="register__message">{{ session('message')}}</h3>
        @endif --}}
        <form action="{{route('admin.store')}}" method="POST" class="register-form" enctype="multipart/form-data">
        @csrf
        <label class="register__label">First name
        <input class="register-form__input" type="text" name="first_name"  placeholder="Enter your first name" required>
        </label>
        <label class="register__label">Second name
        <input class="register-form__input" type="text" name="second_name"  placeholder="Enter your second name" required>
        </label>
        {{-- <label class="register__label">Last name
        <input class="register-form__input" type="text" name="last_name"  placeholder="Enter your last name" required>
        </label> --}}
        <label class="register__label">
            Email
            <input class="register-form__input" type="email"  name="email"  placeholder="Enter your email" required >
        </label>
        <label class="register__label">Password
        <input class="register-form__input" type="password" name="password" id=password-register placeholder="Enter your password" >
        </label>
        <input type="file" name="image" class="register-form__input" accept="image/*">
        @if (count($errors)>0)
        <ul class="register-form-errors">
            @foreach ($errors->all() as $error)
                <li class="register-form-errors__item">{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <input class="register-form__input register-form__input--purple" type="submit" value="Registrar">
        <a class="register-form__link" href="{{route('admin.login')}}"><b>Sign up</b></a>
    </form>
</div>

@endsection
