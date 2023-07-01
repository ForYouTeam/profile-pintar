<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostinganModel extends Model
{
    use HasFactory;
    protected $table    = 'postingan';
    protected $fillable = [
        'id', 'judul', 'kontent', 'galeri_id', 'penulis',
        'created_at', 'updated_at'
    ];

    public function scopejoinList($query)
    {
        return $query
            ->leftJoin('galeri as a', 'postingan.galeri_id', 'a.id')
            ->select(
                'postingan.id'        ,
                'postingan.judul'     ,
                'postingan.kontent'   ,
                'postingan.galeri_id' ,
                'postingan.penulis'   ,
                'a.path as path'      ,
                'postingan.created_at',
                'postingan.updated_at', 
            );
    }
}
