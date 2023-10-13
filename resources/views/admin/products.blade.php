@extends('admin.layouts.admin_layout_index')

@section('title', 'products')

@section('body')


<x-admin.table>
    @if (count($data)> 0)
    @foreach($data['data'] as $product)
    <tr>
        <td class="container-principal-table__td">{{$product['id'] ?? ''}}</td>
        <td class="container-principal-table__td">{{$product['name'] ?? ''}}</td>
        <td class="container-principal-table__td">{{$product['brand'] ?? ''}}</td>
        <td class="container-principal-table__td">{{$product['unit_price'] ?? ''}}</td>
        <td class="container-principal-table__td">{{$product['stock'] ?? ''}}</td>
        <td class="container-principal-table__td">{{$product['categories_id'] ?? ''}}</td>
        <td class="container-principal-table__td">{{$product['new_product'] ?? ''}}</td>
        @if($product['status'] == 1)
        <td>Si</td>
        @else
        <td>No</td>
        @endif
        <td><img src="{{asset($product['img'] ?? '')}}"></td>
        <td>
            <button>
                <a href="{{ route('products.show', $product['id']) }}">Edit</a>
            </button>
            <button>
                <a href="{{ route('products.active', $product['id']) }}">Publicar</a>
            </button>
            <button>
                <a href="{{ route('products.inactive', $product['id']) }}">Desactivar</a>
            </button>
            <button>
                <a href="{{ route('products.destroy', $product['id']) }}">Delete</a>
            </button>
        </td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="6">No hay datos disponibles</td>
    </tr>
    @endif
    <tr>{{$data->links()}}</tr>

</x-admin.table>

@endsection