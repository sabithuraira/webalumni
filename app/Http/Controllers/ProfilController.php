<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jabatan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userId = $user ? $user->id : null;

        $alumni = Alumni::where('user_id', $userId)->firstOrFail();
        $alumniId = $alumni ? $alumni->id : null;

        $jabatans = Jabatan::where('alumni_id', 'like', '%' . $alumniId . '%')
            ->orderBy('mulai_tahun', 'asc')
            ->get();
        $pendidikans = Pendidikan::where('alumni_id', 'like', '%' . $alumniId . '%')
            ->orderBy('mulai_tahun', 'asc')
            ->get();

        return view('user.profil.profilshow', compact('alumni', 'jabatans', 'pendidikans'));
    }
}