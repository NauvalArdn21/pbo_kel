<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Barang extends Model
{
    use LogsActivity;
    use HasFactory;
    protected $table = 'barang';
    protected $guarded = ['id'];

    public function item_transaksi()
    {
        return $this->hasMany('App\Models\ItemTransaksi');
    }
    protected static $logName = 'barang';
    protected static $logUnguarded = true;
}
