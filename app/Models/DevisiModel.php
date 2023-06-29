<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevisiModel extends Model
{
    use HasFactory;
    protected $table    = 'devisi';
    protected $fillable = [
        'id', '_devisi', 'created_at', 'updated_at'
    ];
}
