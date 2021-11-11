<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UpcomingMovie extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'release_date',
        'genere',
        'title',
        'poster',
        'details',
        'trailer',
        'duration',
        'cast',
    ];
}
