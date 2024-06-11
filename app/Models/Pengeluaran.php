<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nominal',
        'deskripsi',
        'tanggal',
        'lingkungan_id',
    ];

    public function lingkungans()
    {
        return $this->belongsTo(Lingkungan::class, 'lingkungan_id');
    }
}
