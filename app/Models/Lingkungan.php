<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lingkungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal',
        'rukun_tetangga_id',
    ];

    public function rts()
    {
        return $this->belongsTo(RukunTetangga::class, 'rukun_tetangga_id');
    }

    public function pengeluarans()
    {
        return $this->hasMany(Pengeluaran::class);
    }
}
