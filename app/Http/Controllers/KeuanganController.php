<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index(Request $request)
    {
        $masuk = Keuangan::where('kategori', 'Pemasukan')->sum('jumlah');
        $keluar = Keuangan::where('kategori', 'Pengeluaran')->sum('jumlah');
        $total = $masuk - $keluar;

        $search = $request->get('search');

        $keuangans = Keuangan::query()
            ->when($search, function ($query, $search) {
                return $query->where('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('tanggal', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%')
                    ->orWhere('jumlah', 'like', '%' . $search . '%');
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(5);

        return view('user.keuangan', compact('keuangans', 'total', 'masuk', 'keluar'));
    }
}
