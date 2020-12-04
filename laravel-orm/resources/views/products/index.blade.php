<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Products Index</h1>
    {{-- @foreach ($products as $product)
        --}}
        {{-- <div> --}}
            {{--
            <!-- yogesh nore --> --}}
            {{-- $loop->index+1 --}}
            {{-- {{ $loop->iteration }}. Product Name: {{ $product->name }}</b> - Rs.<i>
                {{ number_format($product->price, 2) }}</i>
            <a href="{{ url("products/$product->id/edit") }}">EDIT</a>
            <a href="{{ url('products', $product->id) }}">BATAO</a>
            <a href="{{ url('products/destroy', $product->id) }}">DELETE</a>
            <hr /> --}}
            {{--
        </div> --}}
        {{-- @endforeach --}}

    @forelse($products as $product)
        {{ $product->name }}
    @empty
        <h1>No Records Found</h1>
    @endforelse

</body>

</html>
