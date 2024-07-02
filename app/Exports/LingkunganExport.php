<?php

namespace App\Exports;

use App\Models\Lingkungan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class LingkunganExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    protected $lingkungans;

    public function __construct($lingkungans)
    {
        $this->lingkungans = $lingkungans;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->lingkungans;
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'Kegiatan',
            'Tanggal Kegiatan',
            'RT'
        ];
    }

    /**
    * @var Lingkungan $lingkungan
    */
    public function map($lingkungan): array
    {
        return [
            $lingkungan->nama,
            $lingkungan->tanggal,
            $lingkungan->rts->nama
        ];
    }

    /**
    * @return array
    */
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_YYYYMMDD, // Format kolom Tanggal sebagai tanggal
        ];
    }
}
