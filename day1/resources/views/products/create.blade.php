<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Products</title>
</head>

<body>
    <h1>Create New Product</h1>
    <form action="{{ route('product.store') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="">Name</label>
        <input type="text" name="name" id="name"><br />
        <label for="">Price</label>
        <input type="text" name="price" id=""><br />
        <input type="submit" value="Add">
    </form>
</body>

</html>
