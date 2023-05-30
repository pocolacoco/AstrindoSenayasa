<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'name',
        'email',
        'jeniskelamin',
        'tanggal',
        'agama',
        'alamat',
        'pendidikan',
        'kampus',
        'programstudi',
        'ktp',
        'ijazah',
    ];
}
