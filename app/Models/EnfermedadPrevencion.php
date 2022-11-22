<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnfermedadPrevencion extends Model
{
    use HasFactory;
    protected $table='enfermedades_prevenciones';
    protected $primaryKey='id_enfermedad_prevencion';
    protected $fillable = [
        'id_enfermedad',
        'id_prevencion_enfermedad',
    ];
}
