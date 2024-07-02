<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class PengeluaranExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pengeluaran::with('lingkungans')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Jenis Pengeluaran',
            'Nominal',
            'Deskripsi',
            'Tanggal Pengeluaran',
            'Kegiatan',
            'RT'
        ];
    }

    /**
     * @var Pengeluaran $pengeluaran
     */
    public function map($pengeluaran): array
    {
        return [
            $pengeluaran->nama,
            $pengeluaran->nominal,
            $pengeluaran->deskripsi,
            $pengeluaran->tanggal,
            $pengeluaran->lingkungans->nama,
            $pengeluaran->lingkungans->rukun_tetangga_id
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER, // Format kolom Nominal sebagai angka
            'D' => NumberFormat::FORMAT_DATE_YYYYMMDD, // Format kolom Tanggal sebagai tanggal
        ];
    }
}
