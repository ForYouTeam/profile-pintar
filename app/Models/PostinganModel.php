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
}
