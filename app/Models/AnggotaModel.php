<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;
    protected $table    = 'anggota';
    protected $fillable = [
        'id', 'nama', 'sex', 'agama', 'alamat', 'telepon',
        'jabatan_id', 'devisi_id', 'sektor_id', 'created_at', 'updated_at'
    ];
}
