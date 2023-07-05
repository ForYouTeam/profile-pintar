<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarModel extends Model
{
    use HasFactory;
    protected $table    = 'komentar';
    protected $fillable = [
        'id', 'postingan_id', 'alias', '_komentar', 'asal',
        'mac_address', 'tag', 'created_at', 'updated_at'
    ];

    public function scopejoinList($query)
    {
        return $query
            ->leftJoin('postingan as a', 'komentar.postingan_id', 'a.id')
            ->select(
                'komentar.id'          ,
                'komentar.postingan_id',
                'a.judul as postingan' ,
                'komentar.alias'       ,
                'komentar._komentar'   ,
                'komentar.asal'        ,
                'komentar.mac_address' ,
                'komentar.tag'         ,
                'komentar.created_at'  ,
                'komentar.updated_at'  ,
            );
    }
}
