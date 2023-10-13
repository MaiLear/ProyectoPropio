@props(['btnCreateActive'=>''])


<table class="container-principal-table">
    <thead>
        <tr>
            <th class="container-principal-table__th">Id</th>
            <th class="container-principal-table__th">Name</th>
            <th class="container-principal-table__th">brand</th>
            <th class="container-principal-table__th">Price</th>
            <th class="container-principal-table__th">Stock</th>
            <th class="container-principal-table__th">Category</th>
            <th class="container-principal-table__th">New</th>
            <th class="container-principal-table__th">Active</th>
            <th class="container-principal-table__th">Image</th>
            <th class="{{$btnCreateActive}} container-principal-table__th">
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