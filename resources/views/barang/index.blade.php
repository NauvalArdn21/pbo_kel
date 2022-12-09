@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">List Barang</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('barang.create')}}" class="btn btn-primary mb-2">
                    Input Barang
                </a>
                <a href="barang/cetak_barang" targer="_blank" class="btn btn-primary mb-2">
                    Cetak Data Barang
                </a>
                <table class="table table-hover table-bordered table-stripped" id="barang">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status Barang</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    {{-- <tbody>
                    @foreach($barang as $key => $barang)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$barang->kode_barang}}</td>
                            <td>{{$barang->nama_barang}}</td>
                            <td>{{$barang->harga}}</td>
                            <td>{{$barang->stok}}</td>
                            <td>{{$barang->status_barang}}</td>
                            <td>
                                <a href="{{route('barang.show', $barang->kode_barang)}}" class="btn btn-primary btn-xs">
                                    Show
                                </a>
                                <a href="{{route('barang.edit', $barang)}}" class="btn btn-warning btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('barang.destroy', $barang)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
        var table = $('#barang').DataTable({
                    ajax: '',
                    serverSide: true,
                    processing: true,
                    aaSorting:[[0,"desc"]],
                    columns: [
                        {data: 'id', name: 'id', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        {data: 'kode_barang', name: 'kode_barang'},
                        {data: 'nama_barang', name: 'nama_barang'},
                        {data: 'harga', name: 'harga'},
                        {data: 'stok', name: 'stok'},
                        {data: 'status_barang', name: 'status_barang'},
                        {data: 'action', name: 'action'},
                    ]
                });
    </script>
@endpush