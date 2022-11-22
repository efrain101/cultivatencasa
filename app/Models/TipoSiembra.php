<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSiembra extends Model
{
    use HasFactory;
    protected $table="tipos_siembras";
    protected $primaryKey='id_tipo_siembra';
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
