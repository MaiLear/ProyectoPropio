@extends('admin.layouts.admin_layout_index')

@section('title', 'products')

@section('body')

<x-admin.form title="Create product">
    @if (session('msg'))
    <h2 class="container-principal-form__response register__message">{{ session('msg')}}</h2>
    @endif
</x-admin.form>

<div class="container-menu-top-widgetsearch">
        <input type="text" name="search-widget" class="container-menu-top-widgetsearch__input" placeholder="Search">
        <img class="container-menu-top-widgetsearch__icon" src="{{asset('img/lupa.png')}}">
    </div>

<x-admin.table>
    @if(session('products'))
    @foreach(session('products' as $product))
    <tr>
        <td>{{$product['id']}}</td>
        <td>{{$product['name']}}</td>
        <td>{{$product['unit_price']}}</td>
        <td>{{$product['stock']}}</td>
    </tr>
        @endforeach
    @endif
    @else
    @foreach($data as $product)
    <tr>
        <td>{{$product['id'] ?? ''}}</td>
        <td>{{$product['name'] ?? ''}}</td>
        <td>{{$product['unit_price'] ?? ''}}</td>
        <td>{{$product['stock'] ?? ''}}</td>
        <td><img src="{{asset($product['img'] ?? '')}}"></td>
        <td>
            <button>
                <a href="{{ route('admin.products.delete', $product['id']) }}">Eliminar</a>
            </button>
           <button>
             <a href="{{ route('admin.products.view', $product['id']) }}">Editar</a>
           </button>
        </td>
    </tr>
    @endforeach
    @endelse
</x-admin.table>

@endsection