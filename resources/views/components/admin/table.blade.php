@props(['dataProducts'])

<table class="container-principal-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        {{$slot}}
    </tbody>
</table>