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

    public function scopejoinList($query)
    {
        return $query
            ->leftJoin('jabatan as a', 'anggota.jabatan_id', 'a.id')
            ->leftJoin('devisi as b', 'anggota.devisi_id', 'b.id')
            ->leftJoin('sektor as c', 'anggota.sektor_id', 'c.id')
            ->select(
                'anggota.id',
                'anggota.nama',
                'anggota.sex',
                'anggota.agama',
                'anggota.alamat',
                'anggota.telepon',
                'anggota.jabatan_id',
                'a._jabatan as jabatan',
                'anggota.devisi_id',
                'b._devisi as devisi',
                'anggota.sektor_id',
                'c._sektor as sektor',
                'anggota.created_at',
                'anggota.updated_at',
            );
    }
}
