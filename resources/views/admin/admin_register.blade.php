@extends('layouts.admin_layout')
@section('title', 'Admin Register')

@section('body')

<x-formRegister routeLogin="{{route('admin.login')}}" routeSaveData="{{route('admin.store')}}"/>

@endsection