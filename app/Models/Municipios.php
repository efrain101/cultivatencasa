<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    use HasFactory;
    protected $primaryKey='id_municipio';
    protected $fillable = [
        'id_estado',
        'municipio',
    ];
}
