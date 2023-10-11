<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SektorModel extends Model
{
    use HasFactory;
    protected $table    = 'sektor';
    protected $fillable = [
        'id', '_sektor', 'alamat', 'kontak', 'didirikan',
        'created_at', 'updated_at'
    ];
}
