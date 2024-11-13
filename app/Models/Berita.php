<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'dokum',
        'judul',
        'tanggal',
        'isi',
        'created_by',
        'updated_by'
    ];
}
