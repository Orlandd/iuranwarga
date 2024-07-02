<?php

namespace App\Exports;

use App\Models\Warga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class WargaExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    protected $wargas;

    public function __construct($wargas)
    {
        $this->wargas = $wargas;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->wargas;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'NIK',
            'No KK',
            'Gender',
            'Agama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'RT',
        ];
    }

    /**
     * @var Warga $warga
     */
    public function map($warga): array
    {
        return [
            $warga->nama,
            $warga->nik,
            $warga->kk,
            $warga->gender,
            $warga->agama,
            $warga->tempatLahir,
            $warga->tanggalLahir,
            $warga->rts->nama,
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
