<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErradicacionEnfermedadc extends Model
{
    use HasFactory;
    protected $table="erradicaciones_enfermedades_c";
    protected $primaryKey='id_erradicacion_enfermedad';
    protected $fillable = [
        'erradicacion',
    ];
}
