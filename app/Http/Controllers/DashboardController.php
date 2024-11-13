<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jabatan;
use App\Models\Keuangan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        #kas
        $masuk = Keuangan::where('kategori', 'Pemasukan')->sum('jumlah');
        $keluar = Keuangan::where('kategori', 'Pengeluaran')->sum('jumlah');
        $total = $masuk - $keluar;

        #alumni
        $aktif = Alumni::where('status', 'Aktif')->count();
        $pensiun = Alumni::where('status', 'Pensiun')->count();

        #jenisKelaminPie
        $jenisKelamin = Alumni::select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->get();

        $jkData = [];
        foreach ($jenisKelamin as $jk) {
            $jkData['labels'][] = $jk->jenis_kelamin;
            $jkData['data'][] = $jk->total;
        }

        #unitKerjaPie
        $jabatans = Jabatan::select('alumni_id', 'mulai_tahun', 'unit')
            ->selectRaw("CASE 
                    WHEN unit LIKE '%Sumatera Selatan%' THEN 'Sumsel' 
                    ELSE 'Lainnya' 
                 END as region")
            ->orderBy('mulai_tahun', 'desc')
            ->get();

        $filteredJabatans = $jabatans->unique('alumni_id');

        $regionGrouped = $filteredJabatans->groupBy('region')->map(function ($group) {
            return $group->count();
        });

        $regionData = [
            'labels' => $regionGrouped->keys()->toArray(),
            'data' => $regionGrouped->values()->toArray(),
        ];

        #angkatanBar
        $angkatan = Alumni::select('angkatan', DB::raw('count(*) as total'))
            ->groupBy('angkatan')
            ->orderBy('angkatan', 'asc')
            ->get();

        $aktData = [];
        foreach ($angkatan as $akt) {
            $aktData['labels'][] = $akt->angkatan;
            $aktData['data'][] = $akt->total;
        }

        return view('user.dashboard', [
            'total' => $total,
            'aktif' => $aktif,
            'pensiun' => $pensiun,
            'masuk' => $masuk,
            'keluar' => $keluar,
            'jkData' => $jkData,
            'regionData' => $regionData,
            'aktData' => $aktData,
        ]);
    }
}
