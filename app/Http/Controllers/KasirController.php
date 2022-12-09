<?php

namespace App\Http\Controllers;

use App\Models\ItemTransaksi;
use Illuminate\Http\Request;
use App\Models\Kasir;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Throwable;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use App\Jobs\TestSendEmail;

class KasirController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kasir = Kasir::all();
            return DataTables::of($kasir)
                ->addColumn('action', function ($row) {
                    $html = '<a href=' . route('kasir.edit', $row) . ' class="btn btn-warning btn-xs">Edit</a>';
                    $html .= '<a href=' . route('kasir.destroy', $row) . ' class="btn btn-danger btn-xs" onclick="notificationBeforeDelete(event, this)"> Delete </a>';
                    return $html;
                })
                ->toJson();
        }
        log::info("this info tampil kasir all");
        return view('kasir/index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        log::info("this info succes create kasir ");
        return view('kasir/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['status_kasir'] = 'Aktif';
            Kasir::create($data);
            $kasir_message = 'Berhasil menambah Kasir baru';
            log::info("this info succes create kasir ");
            return redirect()->route('kasir.index')
                ->with('success_message', $kasir_message);
        } catch (QueryException $error) {
            error_log($error->getMessage());
            Log::error("this errors create kasir ");
            return redirect()->route('kasir.create')
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kasir = Kasir::find($id);
        log::info("this info edit kasir ");
        return view('kasir/edit', compact('kasir'));
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
        $request->validate([
            'nama_kasir' => 'required',
            'alamat_kasir' => 'required',
        ]);
        $kasir = Kasir::find($id);
        $kasir->nama_kasir = $request->nama_kasir;
        $kasir->alamat_kasir = $request->alamat_kasir;
        $kasir->save();
        log::info("this info success update kasir ");
        return redirect()->route('kasir.index')
            ->with('success_message', 'Berhasil update kasir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasir = Kasir::find($id);
        $kasir->delete();
        return redirect()->route('kasir.index')
            ->with('success_message', 'Berhasil menghapus Kasir');
    }

    public function document()
    {
        $kasir = Kasir::all();
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $html = "";
        $html = view('kasir/cetak_kasir', compact('kasir'));
        $mpdf->writeHTML($html);
        log::info("this info cetak pdf");
        $mpdf->Output("Data kasir.pdf", "I");
    }
}
