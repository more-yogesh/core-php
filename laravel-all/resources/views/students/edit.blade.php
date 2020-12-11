@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('includes.flash-message')
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Student <a href="{{ route('students.index') }}"
                                class="btn btn-primary float-right">Back</a>
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
                        <form method="post" action="{{ route('students.update', $student->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-group ">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ $student->name }}" id=""
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="text" name="age" id="" value="{{ $student->age }}"
                                    class="form-control @error('age') is-invalid @enderror">
                                @error('age')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Mobile</label>
                                <input type="text" name="mobile" id="" value="{{ $student->mobile }}"
                                    class="form-control @error('mobile') is-invalid @enderror">
                                @error('mobile')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-secondary">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
