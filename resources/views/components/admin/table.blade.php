@props(['dataProducts'])

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            {{$dataProducts}}
        </tr>
    </tbody>
</table>