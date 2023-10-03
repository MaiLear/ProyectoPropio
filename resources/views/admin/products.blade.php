@extends('admin.layouts.admin_layout_index')

@section('title', 'products')

@section('body')


<x-admin.table>
    @if (count($data)> 0)
    @foreach($data as $product)
    <tr>
        <td>{{$product['id'] ?? ''}}</td>
        <td>{{$product['name'] ?? ''}}</td>
        <td>{{$product['unit_price'] ?? ''}}</td>
        <td>{{$product['stock'] ?? ''}}</td>
        <td><img src="{{asset($product['img'] ?? '')}}"></td>
        <td>
            <button>
                <a href="{{ route('admin.products.delete', $product['id']) }}">Delete</a>
            </button>
            <button>
                <a href="{{ route('admin.products.view', $product['id']) }}">Edit</a>
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