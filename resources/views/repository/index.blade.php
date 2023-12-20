@extends('layouts.app')
@section('content')

<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        <div>{{ session('success') }}</div>
    </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title"> Data Repository</h4>
            <a href="{{ route('repository.create') }}" class="btn btn-dark">Create</a>
        </div>
        <div class="card-body">
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
                        <td class="text-center" width="160px">
                            <a href="{{ route('repository.edit', $repository->id) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('repository.destroy', $repository->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
