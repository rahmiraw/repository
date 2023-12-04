@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-lg-10 mx-auto">
        <div class="card mt-5">
            <div class="card-header text-center">
                <h2>Data Mahasiswa</h2>
            </div>
            <div class="card-body">
                <form action="{{route('user.index')}}" class="row mb-4">
                    <div class="col-md-2">
                        <a href="{{ route('user.create')}}" class="btn btn-primary float-right">Tambah</a>
                    </div>
                </form>

                @if ($message = Session::get('message'))
                <div class="alert alert-success">
                    <span>{{ $message }}</span>
                </div>
                @endif

                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Usia</th>
                            <th width="30%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataMhs as $mhs)
                        <tr>
                            <td>{{ $mhs['id'] }}</td>
                            <td>{{ $mhs['nama']}}</td>
                            <td>{{ $mhs['nim']}}</td>
                            <td>{{ $mhs['usia']}}</td>
                            <td>
                                <form action="{{ route('user.destroy', $mhs['id']) }}" method="POST">
                                    <a href="{{ route('user.show', $mhs['id']) }}" class="btn btn-secondary">
                                    Detail</a>
                                    <a href="{{ route('user.edit', $mhs['id']) }}" class="btn btn-success">
                                    Edit</a>

                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        @empty
                        <td colspan="3"> Tidak ada data</td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection