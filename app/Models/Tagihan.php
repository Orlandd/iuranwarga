<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'warga_id',
        'status',
        'nominal',
        'deskripsi',
        'tanggalBayar',
    ];

    public function wargas()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }
}
