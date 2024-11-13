<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jabatan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function show($id)
    {
        $alumni = Alumni::findOrFail($id);
        $jabatans = Jabatan::where('alumni_id', 'like', '%' . $id . '%')
            ->orderBy('mulai_tahun', 'asc')
            ->get();
        $pendidikans = Pendidikan::where('alumni_id', 'like', '%' . $id . '%')
            ->orderBy('mulai_tahun', 'asc')
            ->get();

        return view('user.viewalumni.alumnishow', compact('alumni', 'jabatans', 'pendidikans'));
    }

    public function index(Request $request)
    {
        $aktif = Alumni::where('status', 'Aktif')->count();
        $pensiun = Alumni::where('status', 'Pensiun')->count();
        $total = $aktif + $pensiun;

        $search = $request->get('search');

        $alumnis = Alumni::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('angkatan', 'like', '%' . $search . '%')
                    ->orWhere('jenis_kelamin', 'like', '%' . $search . '%');
            })
            ->orderBy('angkatan', 'desc')
            ->paginate(8);

        return view('user.alumni', compact('alumnis', 'total', 'aktif', 'pensiun'));
    }
}
