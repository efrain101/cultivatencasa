<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamaño extends Model
{
    use HasFactory;
    protected $table="tamaños";
    protected $primaryKey='id_tamaño';
    protected $fillable = [
        'tamaño',
    ];
}

