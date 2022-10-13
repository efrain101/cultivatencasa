<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cultivos_enfermedades extends Model
{
    use HasFactory;
    protected $table="cultivos_enfermedades";
    protected $primaryKey='id_cul_enf';
    protected $fillable = [
        'id_cultivo',
        'id_enfermedad',
    ];
}
