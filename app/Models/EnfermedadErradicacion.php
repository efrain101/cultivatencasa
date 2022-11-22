<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnfermedadErradicacion extends Model
{
    use HasFactory;
    protected $table='enfermedades_erradicaciones';
    protected $primaryKey='id_enfermedad_erradicacion';
    protected $fillable = [
        'id_enfermedad',
        'id_erradicacion_enfermedad',
    ];
}
