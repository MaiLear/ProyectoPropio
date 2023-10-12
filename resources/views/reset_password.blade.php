@extends('layouts.customer_layout')

@section('style')
<link rel="stylesheet" href="{{asset('css/forget-password.css')}}">
@endsection

@section('body')

<x-formResetPassword routeForm="{{route('customer.resetpasswordpost')}}">
<x-slot name="inputToken">
    <input type="text" hidden name="token" value="{{$token}}">
</x-slot>

<label>Password
        <br>
        <input class="reset-password-form__input" type="password" name="password" id="">
    </label>
  <label>Confirmated password
  <br>
      <input class="reset-password-form__input" type="password" name="password_confirmation">
  </label>
</x-formResetPassword>

@endsection