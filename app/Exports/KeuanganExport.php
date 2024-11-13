<?php

namespace App\Exports;

use App\Models\Keuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KeuanganExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Keuangan::with('keuanganAlumni') // Assuming there's a relationship called alumni
            ->get()
            ->map(function($keuangan) {
                return [
                    'id' => $keuangan->id,
                    'deskripsi' => $keuangan->deskripsi,
                    'tanggal' => $keuangan->tanggal,
                    'kategori' => $keuangan->kategori,
                    'jumlah' => $keuangan->jumlah,
                    'penerima' => $keuangan->keuanganAlumni->nama ?? '-', // Accessing alumni name
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Deskripsi',
            'Tanggal',
            'Kategori',
            'Jumlah',
            'Penerima'
        ];
    }
}
