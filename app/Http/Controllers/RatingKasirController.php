<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RatingKasir;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class RatingKasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $ratingkasir = RatingKasir::all();
            return DataTables::of($ratingkasir)
                ->addColumn('action', function ($row) {
                    $html = '<a href=' . route('ratingkasir.edit', $row) . ' class="btn btn-warning btn-xs">Edit</a>';
                    $html .= '<a href=' . route('ratingkasir.destroy', $row) . ' class="btn btn-danger btn-xs" onclick="notificationBeforeDelete(event, this)"> Delete </a>';
                    return $html;
                })
                ->toJson();
        }

        return view('ratingkasir/index');
    }

    /**
     * show form creating new rating.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        log::info("this info success rating kasir");
        return view('ratingkasir/create');
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
            'id_kasir.min' => 'ID Kasir harus 5 karakter',
            'id_kasir.max' => 'ID Kasir harus 5 karakter'
        ];

        $request->validate([
            'id_kasir' => 'required|max:5|min:5',
            'namakasir' => 'required',
            'rating' => 'required',
        ], $messages);

        $data = $request->all();
        RatingKasir::create($data);
        $rating_message = 'Berhasil menambah RatingKasir baru';
        log::info("this info success rating kasir");
        return redirect()->route('ratingkasir.index')
            ->with('success_message', $rating_message);
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
        $ratingkasir = RatingKasir::find($id);
        log::info("this info success edit rating kasir ");
        return view('ratingkasir/edit', compact('ratingkasir'));
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
            'rating' => 'required',
        ]);
        $ratingkasir = RatingKasir::find($id);
        $ratingkasir->rating = $request->rating;
        $ratingkasir->save();
        return redirect()->route('ratingkasir.index')
            ->with('success_message', 'Berhasil mengupdate RatingKasir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ratingkasir = RatingKasir::find($id);
        $ratingkasir->delete();
        return redirect()->route('ratingkasir.index')
            ->with('success_message', 'Berhasil menghapus RatingKasir');
    }

    public function document()
    {
        $ratingkasir = RatingKasir::all();
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $html = "";
        $html = view('ratingkasir/cetak_ratingkasir', compact('ratingkasir'));
        $mpdf->writeHTML($html);
        log::info("this info succes cetak pdf");
        $mpdf->Output("RatingKasir.pdf", "D");
    }
}
