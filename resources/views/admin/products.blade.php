@extends('admin.layouts.admin_layout_index')

@section('title', 'products')

@section('body')

<x-admin.form title="Create product" action='post'/>

<x-admin.form title="Update product" action='put'/>

<x-admin.form title="Delete product" action='delete'/>

<x-admin.table>
    <x-slot name="dataProducts">
        <td></td>
    </x-slot>
</x-admin.table>

@endsection