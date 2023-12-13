@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-lg-12 mx-auto">
        <div class="card mt-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th>Description</th>
                        <th>Option</th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($repositories as $index => $repository)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $repository->title }}</td>
                        <td>{{ $repository->author }}</td>
                        <td>{{ $repository->year }}</td>
                        <td>{{ $repository->description }}</td>
                        <td>
                            <a href="#" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
