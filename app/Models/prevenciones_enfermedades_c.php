<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prevenciones_enfermedades_c extends Model
{
    use HasFactory;
    protected $table="prevenciones_enfermedades_c";
    protected $primaryKey='id_prevencion_enfermedad';
    protected $fillable = [
        'prevencion',
    ];
}
