<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    Edit Product
    <form action="{{ route('product.update', $myProduct[0]->id) }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{ dump($myProduct) }}
        <label for="">Name</label>
        <input type="text" name="name" id="name" value="{{ $myProduct[0]->name }}"><br />
        <label for="">Price</label>
        <input type="text" name="price" id="" value="{{ $myProduct[0]->price }}"><br />
        <input type="submit" value="UPDATE">
    </form>
</body>

</html>
