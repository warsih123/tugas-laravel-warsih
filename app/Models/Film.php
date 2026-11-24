<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    protected $fillable = [
        'title',
        'sinopsis',
        'year',
        'poster',
        'genre_id',
        'sutradara_id',
    ];

    // Relasi film dengan genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // Relasi film dengan sutradara
    public function sutradara()
    {
        return $this->belongsTo(Sutradara::class);
    }
}