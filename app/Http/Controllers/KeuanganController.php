<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KeuanganAdvanceExport;

class KeuanganController extends Controller
{
    public function index(Request $request){
        $filter_arr = [];

        $masuk = Keuangan::where('kategori', 'Pemasukan')->sum('jumlah');
        $keluar = Keuangan::where('kategori', 'Pengeluaran')->sum('jumlah');
        $total = $masuk - $keluar;

        $year = '';
        $month = '';

        $search = $request->get('search');
        if(strlen($request->get('year'))>0){
            $year = $request->get('year');
            $filter_arr[] = [DB::raw('YEAR(tanggal)'), '=', $year];
        }

        if(strlen($request->get('month'))>0){
            $month = $request->get('month');
            $filter_arr[] = [DB::raw('MONTH(tanggal)'), '=', $month];
        }
        
        if($request->get('action')==2){
            $str_date = date('Y-m-d h:i:s');
            return Excel::download(new KeuanganAdvanceExport($search, $year, $month), "keuangan_".$str_date.".xlsx");
        }
        else{
            $keuangans = Keuangan::where($filter_arr)
                ->where(
                    (function ($query) use ($search) {
                        $query-> where('deskripsi', 'LIKE', '%' . $search . '%')
                            ->orWhere('jumlah', 'LIKE', '%' . $search . '%');
                    })
                )
                ->orderBy('tanggal', 'desc')
                ->paginate(20);
                
            $keuangans->withPath('keuangan');

            return view('keuangan.index', compact('keuangans', 'total', 
                    'masuk', 'keluar', 'year', 'month')
                );
        }
    }
}
