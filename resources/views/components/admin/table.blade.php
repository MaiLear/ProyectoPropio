@props(['btnCreateActive'=>''])


<table class="container-principal-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <th class="{{$btnCreateActive}}">
                <button>
                    <a href="{{ route('admin.products.create') }}">Create</a>
                </button>
            </th>
        </tr>
    </thead>
    <tbody>
        {{$slot}}
    </tbody>
</table>