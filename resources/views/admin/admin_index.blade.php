@extends('admin.layouts.admin_layout_index')

@section('title', 'principal')


@section('body')

@isset($adminToken)
<h2>{{$adminToken}}</h2>
@endisset

@endsection

@section('scripts')
@isset($adminToken)
<script> 
    window.localStorage.setItem('adminToken',`{{$adminToken}}`)
    </script>
@endisset




@endsection