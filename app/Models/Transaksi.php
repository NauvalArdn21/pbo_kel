<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function kasir()
    {
        return $this->belongsTo('App\Models\Kasir', 'id_kasir');
    }

    public function item_transaksi()
    {
        return $this->hasMany('App\Models\ItemTransaksi');
    }
}
