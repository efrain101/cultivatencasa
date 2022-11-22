<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitacoraSiembra extends Model
{
    use HasFactory;
    protected $table="bitacoras_siembras";
    protected $primaryKey='id_bitacora';
    protected $fillable = [
        'id_mesa_siembra',
        'fecha_seguimiento',
        'crecimiento',
        'observaciones',
        'temperatura actual',
        'humedad_actual',
    ];
}
