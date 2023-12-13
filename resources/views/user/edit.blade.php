@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-lg-10 mx-auto">
        <div class="card mt-5">
            <div class="card-header text-center">
                <h2>Edit Mahasiswa</h2>
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

                @foreach ($dataMhs as $mhs)
                <form action="{{ route('user.update', $mhs['id']) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <strong>Id:</strong>
                            <input type="number" value="{{ $mhs['id'] }}" name="id" class="form-control" placeholder="Id">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama:</strong>
                                <input type="text" value="{{ $mhs['nama'] }}" name="nama" class="form-control" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>NIM:</strong>
                                <input type="number" value="{{ $mhs['nim'] }}" class="form-control" name="nim" placeholder="NIM">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Usia:</strong>
                                <input type="number" value="{{ $mhs['usia'] }}" class="form-control" name="usia" placeholder="Usia">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection