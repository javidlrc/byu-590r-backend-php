<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'lyrics',
        'flow',
        'impact',
        'production',
        'creativity',
        'overall',
        'artist_id'
    ];
}
