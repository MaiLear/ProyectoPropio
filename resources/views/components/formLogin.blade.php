@props(['routeForm','routeRegister', 'titleLogin'])
<div class="container-login">
    <h1 class="container-login__title">{{$titleLogin}}</h1>
    <form action="{{ $routeForm }}" method="POST" class="container-login-form">
        @csrf
        <label class="container-login__label" for="email">Email</label>
        <input class="container-login-form__input" type="email" name="email" placeholder="Enter your email" required value="{{old('email')}}">
        <label class="container-login__label" for="password">Password</label>
        <input class="container-login-form__input" type="password" id=password-login name="password" placeholder="Enter your password" required>
        <div class="container-login-form-password">
            <input id="showpassword" type="checkbox">
            <span>show password</span>
        </div>
        <input class="container-login-form__input container-login-form__input--purple" type="submit" value="Enviar">

        @if(count($errors)>0)
        <ul class="container-login-form-errors">
            @foreach($errors->all() as $error)
            <li class="container-login-form-errors__items">{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <a class="container-login-form__link" href="#">Lost your passoword?</a>
        <a class="container-login-form__link" href="{{ $routeRegister }}">Don't have an account? <b>Register</b> </a>
    </form>
</div>