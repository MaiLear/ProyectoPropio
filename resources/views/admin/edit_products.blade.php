@extends('admin.layouts.admin_layout_index')

@section('title', 'Update')

@section('body')

<x-admin.form   :response=$response  title="Update" valor="'admin.products.put'">
    
</x-admin.form>

@endsection