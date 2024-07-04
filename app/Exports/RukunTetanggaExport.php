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

    public function __construct($rukunTetangga)
    {
        $this->RukunTetangga = $rukunTetangga;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'RT'
        ];
    }

    /**
     * @var RukunTetangga $rukunTetangga
     */
    public function map($rukunTetangga): array
    {
        return [
            $rukunTetangga->nama,
            $rukunTetangga->rts
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT, // Format kolom NIK sebagai teks
            'C' => NumberFormat::FORMAT_TEXT, // Format kolom No KK sebagai teks
        ];
    }
}
