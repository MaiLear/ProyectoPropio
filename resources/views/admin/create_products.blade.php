@extends('admin.layouts.admin_layout_index')

@section('title', 'create')

@section('body')

<x-admin.form title="Create product" action="{{route('products.store')}}">
    @if (session('msg'))
    <h2 class="container-principal-form__response register__message">{{ session('msg')}}</h2>
    @endif
</x-admin.form>

@endsection