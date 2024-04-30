@extends('admin.layouts.admin_layout_index')

@section('title', 'customer')

@php
$route = route('admin.customer.filter');
@endphp
@section('body')

<x-admin.table btnCreateActive="">
    <x-slot name="headersTable">  
        <tr>
        <th class="text-center">Id</th>
        <th class="text-center">First Name</th>
        <th class="text-center">Second Name</th>
        <th class="text-center">Last Name</th>
        <th class="">
                Acciones
        </th>
    </tr>
</x-slot>
    @if (count($dataCustomer)> 0)
    @foreach($dataCustomer as $customer)
    <tr>
        <td>{{$customer['id'] ?? ''}}</td>
        <td>{{$customer['first_name'] ?? ''}}</td>
        <td>{{$customer['second_name'] ?? ''}}</td>
        <td>{{$customer['last_name'] ?? ''}}</td>
        <td>
                <a class="btn btn-danger" href="{{ route('customer.destroy', $customer['id']) }}">Delete</a>
        </td>
    </tr>
    @endforeach
    @else
    <tr>
        <td class="text-center" colspan="6">No hay datos disponibles</td>
    </tr>
    @endif

</x-admin.table>

@endsection