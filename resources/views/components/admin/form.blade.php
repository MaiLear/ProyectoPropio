@props(['title', 'valueMethod'=>'', 'response'=>'', 'nameCategory' ,'classInactive', 'valueAction'])

<h1 class="title-products">{{$title}}</h1>
<form class="row row-cols-1 w-50" action="{{$valueAction}}"  method="post" enctype="multipart/form-data">
    @csrf
    @method($valueMethod)
    {{$slot}}
    <label class="form-label">Name
        <input class="form-control" type="text" name="name" required placeholder="Ingrese el nombre del producto" value="{{$response['name'] ?? ''}}">
    </label>
    <label class="form-label">clothing brand
        <input class="form-control" type="text" name="brand" required placeholder="Ingrese el nombre del producto" value="{{$response['brand'] ?? ''}}">
    </label>
    <label class="form-label">Price
        <input type="number" name="unit_price" class="form-control" value="{{$response['unit_price']?? ''}}">
    </label>
    <label class="form-label">Stock
        <input type="number" name="stock" class="form-control" value="{{$response['stock']?? ''}}">
    </label>
    <label class="form-label">Category
        <input type="text" name="category" class="form-control" value="{{$nameCategory ?? ''}}">
    </label>
    <label class="form-check-label {{$classInactive ?? ''}}">
        <input type="checkbox" name="new_product" class="form-check-input">
        <span>New Product</span>
    </label>
    <input type="file" name="img" accept="image/*" class="form-control">
    <input type="submit" value="Enviar" class="btn btn-success mt-2">
    @if (count($errors)> 0)
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
</form>