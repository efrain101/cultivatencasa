<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class efectoEnfermedadc extends Model
{
    use HasFactory;
    protected $table="efectos_enfermedades_c";
    protected $primaryKey='id_efecto_enfermedad';
    protected $fillable = [
        'efecto',
    ];
}
