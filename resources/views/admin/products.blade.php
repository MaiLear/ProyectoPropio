@extends('admin.layouts.admin_layout_index')

@section('title', 'products')

@section('body')

<x-admin.form title="Create product" action='post'>
    @if (isset($response))
    <h4 class="container-principal-form__response">{{ $response['msg'] }}</h4>
    @endif
</x-admin.form>

<x-admin.table>
    @foreach($data as $product)
    <tr>
        <td>{{$product['id']}}</td>
        <td>{{$product['name']}}</td>
        <td>{{$product['unit_price']}}</td>
        <td>{{$product['stock']}}</td>
        <td>{{$product['img']}}</td>
    </tr>
    @endforeach
</x-admin.table>

@endsection