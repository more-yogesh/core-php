@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('includes.flash-message')
                <div class="card">
                    <div class="card-header">
                        <h2>Product List <a href="{{ route('products.create') }}"
                                class="btn btn-primary float-right">Create</a></h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-info text-white">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category1->name }}({{ $product->category1->price }})</td>
                                        <td>{{ $product->price }}</td>
                                        <td class="d-flex"><a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-success btn-sm mr-1" data-toggle="tooltip"
                                                title="Edit Product" title="Edit">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"><span
                                                        class="fa fa-trash"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
