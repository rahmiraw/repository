@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-lg-10 mx-auto">
        <div class="card mt-5">
            <div class="card-header text-center">
                <h2>Tambah Mahasiswa</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('user.store') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <strong>Id:</strong>
                            <input type="number" name="id" class="form-control" placeholder="Id">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama:</strong>
                                <input type="text" class="form-control" name="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>NIM:</strong>
                                <input type="number" class="form-control" name="nim" placeholder="NIM">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Usia:</strong>
                                <input type="number" class="form-control" name="usia" placeholder="Usia">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection