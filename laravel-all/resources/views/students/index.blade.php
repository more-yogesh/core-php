@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('includes.flash-message')
                <div class="card">
                    <div class="card-header">
                        <h2>Student List <a href="{{ route('students.create') }}"
                                class="btn btn-primary float-right">Create</a></h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-info text-white">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->price }}</td>
                                        <td class="d-flex"><a href="{{ route('students.edit', $student->id) }}"
                                                class="btn btn-success btn-sm mr-1" data-toggle="tooltip"
                                                title="Edit Product" title="Edit">
                                                <span class="fa fa-edit"></span>
                                            </a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
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
