@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Add Product <a href="{{ route('products.index') }}" class="btn btn-primary float-right">Back</a>
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
                        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label for="">category</label>
                                <select name="category" id="category" class="form-control" onchange="getMySub(this.value)">
                                    <option value="">SELECT CATEGORY</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">SUB category</label>
                                <select name="sub_category" id="sub_category" class="form-control">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="product" id=""
                                    class="form-control @error('product') is-invalid @enderror">
                                @error('product')
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


@section('scripts')
    <script>
        getMySub(0);
        function getMySub(id) {
            $.ajax({
                url: '{{ url('get-sub-categories') }}/' + id,
                method: 'GET',
                success: function(data) {
                    // console.log(data.length);
                    len = data.length;
                    // console.log(data[0].name);
                    var subCates = '<option value="">SELECT SUB CAT</option>';
                    for (i = 0; i < len; i++) {
                        subCates += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $('#sub_category').html(subCates);
                }
            });
        }
    </script>
@endsection
