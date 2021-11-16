<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'theater_id',
        'genre',
        'title',
        'poster',
        'details',
        'rating',
        'trailer',
        'duration',
        'cast',
    ];
}
