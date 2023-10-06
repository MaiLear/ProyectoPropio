@props(['title', 'method'=>'', 'response'=>'', 'nameCategory' ,'classInactive'])

<h1 class="title-products">{{$title}}</h1>
<form class="container-principal-form"  method="post" enctype="multipart/form-data">
    @csrf
    {{$slot}}
    <label class="container-principal-form__label">Name
        <input class="container-principal-form__items" type="text" name="name" required placeholder="Ingrese el nombre del producto" value="{{$response['name'] ?? ''}}">
    </label>
    <label class="container-principal-form__label">clothing brand
        <input class="container-principal-form__items" type="text" name="brand" required placeholder="Ingrese el nombre del producto" value="{{$response['brand'] ?? ''}}">
    </label>
    <label class="container-principal-form__label">Price
        <input type="number" name="unit_price" class="container-principal-form__items" value="{{$response['unit_price']?? ''}}">
    </label>
    <label class="container-principal-form__label">Stock
        <input type="number" name="stock" class="container-principal-form__items" value="{{$response['stock']?? ''}}">
    </label>
    <label class="container-principal-form__label">Category
        <input type="text" name="category" class="container-principal-form__items" value="{{$nameCategory ?? ''}}">
    </label>
    <div>
        <input type="checkbox" name="new_product" class="{{$classInactive ?? ''}}"><span class="container-principal-form__text--small">New product</span>
    </div>
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