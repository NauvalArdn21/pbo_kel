<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTransaksi extends Model
{
    use HasFactory;
    protected $table = 'item_transaksi';
    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->belongsTo('App\Models\Transaksi', 'id_transaksi', 'id_transaksi');
    }

    public function barang()
    {
        return $this->belongsTo('App\Models\Barang', 'kode_barang', 'kode_barang');
    }
}
