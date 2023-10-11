@props(['divImage'=>'', 'lastnameInput'=>'','routeLogin','routeSaveData'])
<div class="container-register">
    {{$divImage}}
    <form action="{{ $routeSaveData }}" method="POST" class="container-register-form">
        @csrf
        <h1 class="container-register-form__title">Sign in</h1>
        @if(session('msg'))
        <h2 class="container-register-form__response register__message">{{session('msg')}}</h2>
        @endif
        <label class="container-register-form__label">First name<br>
            <input class="container-register-form__input" type="text" name="first_name" id="first_name" placeholder="Enter your first name" value="{{old('first_name')}}">
        </label>
        <label class="container-register-form__label" for="second_name">Second name<br>
            <input class="container-register-form__input" type="text" name="second_name" id="second_name" placeholder="Enter your second name" value="{{old('second_name')}}">
        </label>

        {{ $lastnameInput }}

        <label class="container-register-form__label" for="email">Email<br>
            <input class="container-register-form__input" type="email" name="email" id="email" placeholder="Enter your email" value="{{old('email')}}">
        </label>
        <label class="container-register-form__label" for="password">Password<br>
            <input class="container-register-form__input" type="password" name="password" id="password" placeholder="Enter your password">
        </label>
        @if(count($errors)>0)
        <ul class="container-register-form-errors">
            @foreach($errors->all() as $error)
            <li class="container-register-form-errors__items">{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <input type="submit" class="container-register-form__input container-register-form__input--purple" value="Send">
        <a class="container-register-form__link" href="{{ $routeLogin }}">Sign up</a>
    </form>
</div>