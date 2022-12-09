<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Error;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Throwable;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $barang = Barang::where('is_delete', 0)->get();

            return DataTables::of($barang)
                ->addColumn('action', function ($row) {
                    $html = '<a href=' . route('barang.show', $row->kode_barang) . ' class="btn btn-primary btn-xs">Show</a> ';
                    $html .= '<a href=' . route('barang.edit', $row) . ' class="btn btn-warning btn-xs">Edit</a>';
                    $html .= '<a href=' . route('barang.destroy', $row) . ' class="btn btn-danger btn-xs" onclick="notificationBeforeDelete(event, this)"> Delete </a>';
                    return $html;
                })
                ->toJson();
        }
        Log::info("this info barang all");
        return view('barang/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang/create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'harga.min' => 'Tidak boleh kurang dari 1',
            'stok.min' => 'Tidak Boleh Negatif',
        ];
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|numeric|min:0',
        ], $messages);

        try {
            $data = $request->all();
            $data['status_barang'] = 'Tidak Rusak';
            $data['kode_barang'] = getKodeBarang();
            $data['is_delete'] = 0;
            Barang::create($data);
            $barang_message = 'Berhasil menambah barang baru';
            log::info("this info stok barang update");
            return redirect()->route('barang.index')
                ->with('success_message', $barang_message);
        } catch (QueryException $error) {
            error_log($error->getMessage());
            log::error($error->getMessage());
            return redirect()->route('barang.create')
                ->with('error_message', 'Gagal Menyimpan Barang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $barang = Barang::where('kode_barang', $id)->first();
        } catch (ModelNotFoundException $exception) {
            abort(404);
            log::info("this info failed show barang ");
        }
        return view('barang/show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        log::info("this info succes edit barang");
        return view('barang/edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        log::info("this info update rating kasir");
        $messages = [
            'harga.min' => 'Tidak boleh kurang dari 1',
            'stok.min' => 'Tidak Boleh Negatif',
        ];
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|numeric|min:0',
        ], $messages);

        $barang = Barang::find($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        $barang->save();
        log::info("this info succes update barang");
        return redirect()->route('barang.index')
            ->with('success_message', 'Berhasil mengupdate barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        log::info("this info success delete rating kasir");
        $barang = Barang::find($id);
        $barang->is_delete = 1;
        $barang->save();
        return redirect()->route('barang.index')
            ->with('success_message', 'Berhasil menghapus barang');
    }

    public function document()
    {
        log::info("this info cetak pdf barang");
        $barang = Barang::all();
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $html = "";
        $html = view('barang/cetak_barang', compact('barang'));
        $mpdf->writeHTML($html);

        $mpdf->Output("Data Barang.pdf", "I");
    }
}
