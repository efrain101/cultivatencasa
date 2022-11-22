<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnfermedadEfecto extends Model
{
    use HasFactory;
    protected $table='enfermedades_efectos';
    protected $primaryKey='id_enfermedad_efecto';
    protected $fillable = [
        'id_enfermedad',
        'id_efecto_enfermedad',
    ];
}
