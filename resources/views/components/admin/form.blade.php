@props(['title', 'method'=>'','valor'=>'', 'response'=>''])

<h1 class="title-products">{{$title}}</h1>
{{$valor}}
<form class="container-principal-form"  method="post" enctype="multipart/form-data">
    @csrf
    {{$slot}}
    <label class="container-principal-form__label">Name
        <input class="container-principal-form__items" type="text" name="name" require placeholder="Ingrese el nombre del producto" value="{{$response['name'] ?? ''}}">
    </label>
    <label class="container-principal-form__label">Price
        <input type="number" name="unit_price" class="container-principal-form__items" value="{{$response['unit_price']?? ''}}">
    </label>
    <label class="container-principal-form__label">Stock
        <input type="number" name="stock" class="container-principal-form__items" value="{{$response['stock']?? ''}}">
    </label>
    <input type="file" name="img" accept="image/*">
    <input type="submit" value="Enviar" class="container-principal-form__items container-principal-form__items--purple">
    @if (count($errors)> 0)
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
</form>