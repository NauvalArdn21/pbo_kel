@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Show Barang</h1>
@stop

@section('content')
<form action="{{route('barang.update', $barang)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Kasir</label>
                        <input type="text" class="form-control @error('namakasir') is-invalid @enderror" id="exampleInputName" placeholder="Nama Kasir" name="namakasir" value="{{$ratingkasir->namakasir}}">
                        @error('namakasir) <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Rating Kasir</label>
                        <input type="number" class="form-control @error('rating') is-invalid @enderror" id="exampleInputName" placeholder="Rating Kasir" name="rating" value="{{$ratingkasir->rating}}">
                        @error('rating') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputName">Create</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" id="exampleInputName" placeholder="Stok Barang" name="stok" value="{{$barang->stok}}">
                        @error('stok') <span class="text-danger">{{$message}}</span> @enderror
                    </div> -->
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('barang.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop