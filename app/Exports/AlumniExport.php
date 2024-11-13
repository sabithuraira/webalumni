<?php

namespace App\Exports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlumniExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Alumni::with(['jabatanAlumni', 'pendidikanAlumni'])->get()->map(function($alumni) {
            return [
                'id' => $alumni->id,
                'nama' => $alumni->nama,
                'angkatan' => $alumni->angkatan,
                'jenis_kelamin' => $alumni->jenis_kelamin,
                'tempat_lahir' => $alumni->tempat_lahir,
                'tanggal_lahir' => $alumni->tanggal_lahir,
                'status' => $alumni->status,
                'nama_pasangan' => $alumni->nama_pasangan,
                'unit_kerja' => $this->getUnitKerja($alumni),
                'jabatan' => $this->getJabatan($alumni),
                'jenjang' => $this->getJenjang($alumni),
                'sekolah' => $this->getSekolah($alumni),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Angkatan',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Status',
            'Nama Pasangan',
            'Unit Kerja',
            'Jabatan',
            'Jenjang',
            'Sekolah'
        ];
    }

    private function getUnitKerja($alumni)
    {
        return $alumni->jabatanAlumni->sortBy('mulai_tahun')->pluck('unit')->implode(', ');
    }

    private function getJabatan($alumni)
    {
        return $alumni->jabatanAlumni->sortBy('mulai_tahun')->pluck('jabatan')->implode(', ');
    }

    private function getJenjang($alumni)
    {
        return $alumni->pendidikanAlumni->sortBy('mulai_tahun')->pluck('jenjang')->implode(', ');
    }

    private function getSekolah($alumni)
    {
        return $alumni->pendidikanAlumni->sortBy('mulai_tahun')->pluck('sekolah')->implode(', ');
    }
}