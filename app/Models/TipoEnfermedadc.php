<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEnfermedadc extends Model
{
    use HasFactory;
    protected $table="tipos_enfermedades_c";
    protected $primaryKey='id_tipo_enfermedad';
    protected $fillable = [
        'tipo',
    ];
}
