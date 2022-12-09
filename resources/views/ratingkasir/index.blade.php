@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">List Rating Kasir</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('ratingkasir.create')}}" class="btn btn-primary mb-2">
                    Input Rating Kasir
                </a>
                <a href="ratingkasir/cetak_ratingkasir" target="_blank" class="btn btn-primary mb-2">
                    Cetak Data Rating 
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Id_Kasir</th>
                        <th>Nama Kasir</th>
                        <th>Rating Kasir</th>
                        <th>Tanggal Rating</th>
                        <th>Opsi</th>
                    </tr>
                    </thead>
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
        var table = $('#ratingkasir').DataTable({
                    ajax: '',
                    serverSide: true,
                    processing: true,
                    aaSorting:[[0,"desc"]],
                    columns: [
                        {data: 'id', name: 'id', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }},
                        {data: 'id_kasir', name: 'id_kasir'},
                        {data: 'namakasir', name: 'namakasir'},
                        {data: 'rating', name: 'rating'},
                        {data: 'updated_at', name: 'updated_at'},
                        {data: 'action', name: 'action'},
                    ]
                });
    </script>
@endpush