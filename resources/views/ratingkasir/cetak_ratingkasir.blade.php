
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
	<h4 class="centered">Data Rating Kasir</h4>
    
	<table class='table table-bordered'>
		<thead>
        <tr>
            <th>No.</th>
            <th>Id_Kasir</th>
            <th>Nama Kasir</th>
            <th>Rating Kasir</th>
            <th>Tanggal Rating</th>
        </tr>
		</thead>
		<tbody>
        @foreach($ratingkasir as $key => $ratingkasir)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$ratingkasir->id_kasir}}</td>
                <td>{{$ratingkasir->namakasir}}</td>
                <td>{{$ratingkasir->rating}}</td>
                <td>{{$ratingkasir->created_at}}</td>
            </tr>
        @endforeach
		</tbody>
	</table>
 