<?php

namespace App\Exports;

use App\Models\RukunTetangga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class RukunTetanggaExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return RukunTetangga::with('warga')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama RT',
            'Nama Ketua RT'
        ];
    }

    /**
     * @var RukunTetangga $rukunTetangga
     */
    public function map($rukunTetangga): array
    {
        return [
            $rukunTetangga->nama,
            optional($rukunTetangga->warga)->nama ?? 'Tidak ada Ketua'
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT, // Format kolom Nama RT sebagai teks
            'B' => NumberFormat::FORMAT_TEXT, // Format kolom Nama Ketua RT sebagai teks
        ];
    }
}
