<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class RatingKasir extends Model
{
    use LogsActivity;
    use HasFactory;
    protected $table = 'ratingkasir';
    protected $guarded = ['id'];
}
