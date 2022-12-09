@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Show Kasir</h1>
@stop

@section('content')
<form action="{{route('kasir.update', $kasir)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama kasir</label>
                        <input type="text" class="form-control @error('nama_kasir') is-invalid @enderror" id="exampleInputName" placeholder="Nama kasir" name="nama_kasir" value="{{$kasir->nama_kasir}}">
                        @error('nama_barang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">alamat kasir</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputName" placeholder="alamat kasir" name="alamat_kasir" value="{{$kasir->}}">
                        @error('alamat_kasir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">status kasirk</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="exampleInputName" placeholder="Stok Barang" name="stok" value="{{$kasir->stok}}">
                        @error('status_kasir') <span class="text-danger">{{$message}}</span> @enderror
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