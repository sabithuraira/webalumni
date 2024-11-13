<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'mulai_tahun',
        'selesai_tahun',
        'jenjang',
        'sekolah',
        'keterangan',
        'alumni_id',
        'created_by',
        'updated_by'
    ];
}
