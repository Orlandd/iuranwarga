<?php

namespace App\Exports;

use App\Models\Tagihan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TagihanExport implements FromCollection, WithHeadings, WithMapping
{
    protected $tagihans;

    public function __construct($tagihans)
    {
        $this->tagihans = $tagihans;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->tagihans;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Warga',
            'Nominal',
            'Deskripsi',
            'Jenis',
            'Status',
            'Tanggal Bayar'
        ];
    }

    /**
     * @var Tagihan $tagihan
     */
    public function map($tagihan): array
    {
        return [
            $tagihan->id,
            $tagihan->wargas->nama,
            $tagihan->nominal,
            $tagihan->deskripsi,
            $tagihan->jenis,
            $tagihan->status,
            $tagihan->tanggalBayar
        ];
    }
}
