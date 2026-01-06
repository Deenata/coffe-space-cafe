<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
	use HasFactory;

	protected $fillable = [
		'judul',
		'deskripsi',
		'gambar',
		'status',
		'kode_promo',
		'tanggal_berakhir',
	];

	protected $casts = [
		'tanggal_berakhir' => 'date',
	];
} 