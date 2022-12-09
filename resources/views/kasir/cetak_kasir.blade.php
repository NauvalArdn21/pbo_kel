
<style type="text/css">
        table{
            width: 100%;
            border-collapse: collapse;
        }
		table tr td,
		table tr th{
			font-size: 9pt;
            border: 1px solid;
		}
        .centered{
            text-align : center;
        }
        td{
            padding-left:10px;
        }
	</style>
	<h4 class="centered">Data Kasir</h4>
    
	<table class='table table-bordered'>
		<thead>
            <tr>
                <th>No</th>
                <th>Nama kasir</th>
                <th>alamat kasir</th>
                <th>status kasir</th>
                <th>password</th>
            </tr>
		</thead>
        @foreach($kasir as $key => $kasir)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$kasir->nama_kasir}}</td>
            <td>{{$kasir->alamat_kasir}}</td>
            <td>{{$kasir->status_kasir}}</td>
            <td>{{$kasir->password}}</td>
        </tr>
        @endforeach
	</table>
 