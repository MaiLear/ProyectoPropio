@extends('layouts.admin_layout')
@section('title', 'ADMIN container-register')

@section('body')

<x-formRegister routeLogin="{{route('admin.login')}}" routeSaveData="{{route('admin.store')}}"/>

@endsection