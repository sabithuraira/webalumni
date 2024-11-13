<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keuangan extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'deskripsi',
        'tanggal',
        'kategori',
        'jumlah',
        'penerima',
        'created_by',
        'updated_by'
    ];

    public function keuanganAlumni()
    {
        return $this->belongsTo(Alumni::class, 'penerima');
    }
}
