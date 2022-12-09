<?php

use App\Models\Barang;

function getKodeBarang()
{
    $barang = Barang::orderBy('kode_barang', 'desc')->first();
    $kode = 'BR';
    $urutan = ($barang) ? intval(substr($barang->kode_barang, 2, 7)) + 1 : 1;
    $kode_barang = $kode . str_pad($urutan, 5, '0', STR_PAD_LEFT);
    return $kode_barang;
}
