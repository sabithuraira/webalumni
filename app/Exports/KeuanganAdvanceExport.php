<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\Keuangan;
use Illuminate\Support\Facades\DB;

class KeuanganAdvanceExport implements FromView, WithTitle{
    private static $keyword;
    private static $year;
    private static $month;

    public function __construct($keyword, $year, $month) {
        self::$keyword = $keyword;
        self::$year = $year;
        self::$month = $month;
    }

    public function view(): View{
        $filter_arr = [];

        if(strlen(self::$year)>0){;
            $filter_arr[] = [DB::raw('YEAR(tanggal)'), '=', self::$year];
        }

        if(strlen(self::$month)>0){;
            $filter_arr[] = [DB::raw('MONTH(tanggal)'), '=', self::$month];
    
        }
   
        $search = self::$keyword;

        $keuangans = Keuangan::where($filter_arr)
            ->where(
                (function ($query) use ($search) {
                    $query-> where('deskripsi', 'LIKE', '%' . $search . '%')
                        ->orWhere('jumlah', 'LIKE', '%' . $search . '%');
                })
            )
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('exports.keuangan', [
            'datas'=> $keuangans, 
        ]);
    }

    public function title(): string{
        return 'fenomena';
    }
}