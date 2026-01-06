<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'status',
        'deskripsi',
        'gambar',
        'is_best_seller',
    ];
}
