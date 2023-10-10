@extends('admin.layouts.admin_layout_index')

@section('title', 'Update')

@section('body')

<x-admin.form  :response="$productsResponse" :nameCategory="$nameCategory" title="Update" classInactive="container-principal-form--inactive" action="{{route('products.update', $productsResponse['id'])}}" metodo="PUT">
    
</x-admin.form>

@endsection