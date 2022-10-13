<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos_siembras extends Model
{
    use HasFactory;
    protected $primaryKey='id_tipo_siembra';
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
