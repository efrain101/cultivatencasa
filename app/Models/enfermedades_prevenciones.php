<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enfermedades_prevenciones extends Model
{
    use HasFactory;
    protected $primaryKey='id_enfermedad_prevencion';
    protected $fillable = [
        'id_enfermedad',
        'id_prevencion_enfermedad',
    ];
}
