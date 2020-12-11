@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Add Categories <a href="{{ route('categories.index') }}" class="btn btn-primary float-right">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="post" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="form-group ">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" id=""
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" name="price" id="" value="{{ old('price') }}"
                                    class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-secondary">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
