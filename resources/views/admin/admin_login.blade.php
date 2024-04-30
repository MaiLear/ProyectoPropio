@extends('layouts.admin_layout')
@section('title', 'Admin Login')

@section('body')
<x-formLogin routeForm="{{route('admin.authenticate')}}" routeRegister="{{route('admin.create')}}" titleLogin="Login" routeForgotPassword="{{route('admin.forgotpassword')}}" />
@endsection