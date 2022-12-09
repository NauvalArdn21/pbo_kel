@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Rating Kasir</h1>
@stop

@section('content')
<form action="{{route('ratingkasir.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Id Kasir</label>
                        <input type="text" class="form-control @error('id_kasir') is-invalid @enderror" id="exampleInputName" placeholder="id_kasir" name="id_kasir" value="{{old('id_kasir')}}">
                        @error('id_kasir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Kasir</label>
                        <input type="text" class="form-control @error('namakasir') is-invalid @enderror" id="exampleInputName" placeholder="Nama Kasir" name="namakasir" value="{{old('namakasir')}}">
                        @error('namakasir') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Rating</label>
                        <input type="number" class="form-control @error('rating') is-invalid @enderror" id="exampleInputName" placeholder="Rating Kasir" name="rating" value="{{old('rating')}}">
                        @error('rating') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('ratingkasir.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop