<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    protected $table = 'kampus';

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'website'

        // tambahkan kolom lainnya sesuai kebutuhan
    ];
}
