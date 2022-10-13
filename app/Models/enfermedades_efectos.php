<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enfermedades_efectos extends Model
{
    use HasFactory;
    protected $primaryKey='id_enfermedad_efecto';
    protected $fillable = [
        'id_enfermedad',
        'id_efecto_enfermedad',
    ];
}
