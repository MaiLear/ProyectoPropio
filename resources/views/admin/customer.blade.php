@extends('admin.layouts.admin_layout_index')

@section('title', 'customer')


@section('body')

<x-admin.table  btnCreateActive="inactive">
    @if (count($dataCustomer)> 0)
    @foreach($dataCustomer as $customer)
    <tr>
        <td>{{$customer['id'] ?? ''}}</td>
        <td>{{$customer['first_name'] ?? ''}}</td>
        <td>{{$customer['second_name'] ?? ''}}</td>
        <td>{{$customer['last_name'] ?? ''}}</td>
        <td>{{$customer['email'] ?? ''}}</td>
        <td>
            <button>
                <a href="{{ route('admin.customers.delete', $customer['id']) }}">Delete</a>
            </button>
        </td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="6">No hay datos disponibles</td>
    </tr>
    @endif

</x-admin.table>

@endsection