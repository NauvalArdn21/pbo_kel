<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Kasir extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table = 'kasir';
    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi');
    }

    protected static $logname = 'kasir';
    protected static $logUnguarded = true;
}
