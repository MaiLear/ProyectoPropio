@props(['btnCreateActive'=>''])


<table class="container-principal-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>brand</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
            <th>New</th>
            <th>Image</th>
            <th class="{{$btnCreateActive}}">
                <button>
                    <a href="{{ route('products.create') }}">Create</a>
                </button>
            </th>
        </tr>
    </thead>
    <tbody>
        {{$slot}}
    </tbody>
</table>