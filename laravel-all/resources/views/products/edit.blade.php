@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- {{ dd($product[0]->name) }} --}}
                    <div class="card-header">
                        <h2>Add Product <a href="{{ route('products.index') }}" class="btn btn-primary float-right">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.update', $product[0]->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" id="" class="form-control" value="{{ $product[0]->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" name="price" id="" class="form-control" value="{{ $product[0]->price }}">
                            </div>
                            <button class="btn btn-secondary">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
