
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
	<h4 class="centered">Data Barang</h4>
    
	<table class='table table-bordered'>
		<thead>
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Status Barang</th>
            </tr>
		</thead>
        @foreach($barang as $key => $barang)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$barang->kode_barang}}</td>
            <td>{{$barang->nama_barang}}</td>
            <td>{{$barang->harga}}</td>
            <td>{{$barang->stok}}</td>
            <td>{{$barang->status_barang}}</td>
        </tr>
        @endforeach
	</table>
 