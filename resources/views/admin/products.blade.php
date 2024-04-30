@extends('admin.layouts.admin_layout_index')

@section('title', 'products')

@php
$route = route('products.filter');
@endphp
{{-- @section('formRoute',$route) --}}

@section('body')


<x-admin.table>
    <x-slot name="btnCreateActive">
        <a class="btn btn-dark mt-5 me-5" href="{{ route('products.create') }}" style="align-self: end">Create</a>
    </x-slot>
    @if (count($data)> 0)
    <x-slot name="headersTable">  
        <tr>
        <th class="text-center">Id</th>
        <th class="text-center">Name</th>
        <th class="text-center">brand</th>
        <th class="text-center">Price</th>
        <th class="text-center">Stock</th>
        <th class="text-center">Category</th>
        <th class="text-center">New</th>
        <th class="text-center">Active</th>
        <th class="text-center">Image</th>
        <th class="">
                Acciones
        </th>
    </tr>
</x-slot>
    <tbody>
        @foreach($data as $product)
        <tr>
            <td class="container-principal-table__td">{{$product['id']}}</td>
            <td class="container-principal-table__td">{{$product['name'] ?? ''}}</td>
            <td class="container-principal-table__td">{{$product['brand'] ?? ''}}</td>
            <td class="container-principal-table__td">{{$product['unit_price'] ?? ''}}</td>
            <td class="container-principal-table__td">{{$product['stock'] ?? ''}}</td>
            <td class="container-principal-table__td">{{$product['categories_id'] ?? ''}}</td>
            <td class="container-principal-table__td">{{$product['new_product'] ?? ''}}</td>
            @if($product['status'])
            <td>Si</td>
            @else
            <td>No</td>
            @endif
            <td><img class="w-100" style="object-fit: cover;" src="{{asset($product['img'] ?? '')}}"></td>
            <td>
                
                    <div class="btn-group-vertical">
                        <a class="btn btn-primary" href="{{ route('products.show', $product['id']) }}">Edit</a>
                        
                        
                        <a class="btn btn-success" href="{{ route('products.active', $product['id']) }}">Active</a>
                        
                        
                        <a class="btn btn-warning" href="{{ route('products.inactive', $product['id']) }}">Desactive</a>
                        
                        
                        <a class="btn btn-danger" href="{{ route('products.destroy', $product['id']) }}">Delete</a>
                    </div>
                
            </td>
        </tr>
        @endforeach
    </tbody>
    @else
    <tr>
        <td colspan="6">No hay datos disponibles</td>
    </tr>
    @endif

</x-admin.table>
{{-- {!! $data->links() !!} --}}

@endsection