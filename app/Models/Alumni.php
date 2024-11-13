<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumni extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'profpic',
        'nama',
        'angkatan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status',
        'nama_pasangan',
        'created_by',
        'updated_by'
    ];

    public function jabatanAlumni()
    {
        return $this->hasMany(Jabatan::class);
    }

    public function pendidikanAlumni()
    {
        return $this->hasMany(Pendidikan::class);
    }
}
