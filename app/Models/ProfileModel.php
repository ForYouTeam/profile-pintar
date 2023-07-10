<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;
    protected $table    = 'profile';
    protected $fillable = [
        'id', 'telepon', 'email', 'alamat', 'visi', 'misi', 'deskripsi', 'created_at', 'updated_at'
    ];
}
