<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivo extends Model
{
    use HasFactory;
    protected $table='cultivos';
    protected $primaryKey='id_cultivo';
    protected $fillable = [
        'nombre',
        'id_ambiente',
        'id_tipo_siembra',
        'id_temperatura',
        'id_humedad',
        'id_temporada',
        'id_periodo',
        'imagen',
    ];
}
