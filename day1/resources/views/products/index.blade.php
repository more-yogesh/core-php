<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Product List</h1>
    {{-- {{ dd($myProducts) }} --}}
    <table border="1">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>price</th>
            <th>action</th>
        </tr>
        @foreach ($myProducts as $myProduct)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $myProduct->name }}</td>
                <td>{{ $myProduct->price }}</td>
                <td><a href="{{ url('product/destroy/'.$myProduct->id) }}">DELETE</a>
                    <a href="{{ url('product/edit/'.$myProduct->id) }}">Edit</a></td>
            </tr>
        @endforeach
    </table>
</body>

</html>
