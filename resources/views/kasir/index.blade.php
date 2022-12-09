@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">List Kasir</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('kasir.create')}}" class="btn btn-primary mb-2">
                    Input kasir
                </a>
                <a href="kasir/cetak_kasir" target="_blank" class="btn btn-primary mb-2">
                    Cetak Data Kasir
                </a>
                <table class="table table-hover table-bordered table-stripped" id="kasir">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama kasir</th>
                        <th>alamat kasir</th>
                        <th>status kasir</th>
                        <th>password</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    {{-- <tbody>
                    @foreach($kasir as $key => $kasir)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$kasir->nama_kasir}}</td>
                            <td>{{$kasir->alamat_kasir}}</td>
                            <td>{{$kasir->status_kasir}}</td>
                            <td>{{$kasir->password}}</td>
                            <td>
                                <a href="{{route('kasir.edit', $kasir)}}" class="btn btn-warning btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('kasir.destroy', $kasir)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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
        var table = $('#kasir').DataTable({
                    ajax: '',
                    serverSide: true,
                    processing: true,
                    aaSorting:[[0,"desc"]],
                    columns: [
                        {data: 'id', name: 'id', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        {data: 'nama_kasir', name: 'nama_kasir'},
                        {data: 'alamat_kasir', name: 'alamat_kasir'},
                        {data: 'status_kasir', name: 'status_kasir'},
                        {data: 'password', name: 'password'},
                        {data: 'action', name: 'action'},
                    ]
                });
    </script>
@endpush