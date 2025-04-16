<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_id',
        'name',
        'description',
        'favSong',
        'favAlbum',
        'country',
        'file'
    ];

    public function genre(): HasOne {
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }
}
