<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    use HasFactory;
    protected $table="estadisticas";
    protected $primaryKey='id';
    protected $fillable = [
        'id_mesa_siembra',
        'fecha',
        'temperatura',
        'humedad',
        'humedadsuelo',
    ];
}
