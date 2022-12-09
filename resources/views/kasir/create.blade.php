@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah kasir</h1>
@stop

@section('content')
<form action="{{route('kasir.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama kasir</label>
                        <input type="text" class="form-control @error('nama_kasir') is-invalid @enderror" id="exampleInputName" placeholder="nama kasir" name="nama_kasir" value="{{old('nama_kasir')}}">
                        @error('nama_kasir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Alamat Kasir</label>
                        <input type="text" class="form-control @error('alamat_kasir') is-invalid @enderror" id="exampleInputName" placeholder="alamat kasir" name="alamat_kasir" value="{{old('alamat_kasir')}}">
                        @error('alamat_kasir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="exampleInputName" placeholder="alamat kasir" name="password" value="{{old('password')}}">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('kasir.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop