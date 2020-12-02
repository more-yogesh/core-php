<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Products Edit</h1>
    <form action="{{ url('products/update', $product->id) }}" method="POST">
        @csrf
        <input type="text" name="name" id="" placeholder="Enter Name" value="{{ $product->name }}">
        <input type="number" name="price" id="" placeholder="Enter Price" value="{{ $product->price }}">
        <input type="submit" value="UPDATE">
    </form>
</body>

</html>
