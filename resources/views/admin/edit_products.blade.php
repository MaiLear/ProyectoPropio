@extends('admin.layouts.admin_layout_index')

@section('title', 'Update')

@section('body')


<x-admin.form :response="$productsResponse" :nameCategory="$nameCategory" title="Update" classInactive="" valueAction="{{route('products.update', $productsResponse['id'])}}" valueMethod="PUT">

</x-admin.form>

@endsection