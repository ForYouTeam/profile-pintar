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
        'mac_address', 'created_at', 'updated_at'
    ];
}
