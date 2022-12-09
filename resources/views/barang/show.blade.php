@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Show Barang</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="exampleInputName" placeholder="Nama Barang" name="nama_barang" value="{{$barang->nama_barang}}" disabled>
                        @error('nama_barang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="exampleInputName" placeholder="Harga Barang" name="harga" value="{{$barang->harga}}" disabled>
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="exampleInputName" placeholder="Stok Barang" name="stok" value="{{$barang->stok}}" disabled>
                        @error('stok') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop