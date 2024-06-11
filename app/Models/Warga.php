<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'kk',
        'gender',
        'agama',
        'tempatLahir',
        'tanggalLahir',
        'image',
        'rukun_tetangga_id',
    ];

    public function rts()
    {
        return $this->belongsTo(RukunTetangga::class, 'rukun_tetangga_id');
    }

    public function rt(): BelongsTo
    {
        return $this->belongsTo(RukunTetangga::class);
    }
}
