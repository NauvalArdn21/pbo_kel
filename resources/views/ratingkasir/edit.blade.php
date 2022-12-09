@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Rating Kasir</h1>
@stop

@section('content')
<form action="{{route('ratingkasir.update', $ratingkasir)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Rating</label>
                        <input type="number" class="form-control @error('rating') is-invalid @enderror" id="exampleInputName" placeholder="Rating" name="rating" value="{{$ratingkasir->rating}}">
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