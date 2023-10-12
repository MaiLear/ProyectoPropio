@extends('layouts.customer_layout')

@section('style')
<link rel="stylesheet" href="{{asset('css/forget-password.css')}}">
@endsection

@section('body')

<x-formResetPassword routeForm="{{route('customer.forgotpasswordPost')}}"/>

@endsection