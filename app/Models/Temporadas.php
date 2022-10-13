<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporadas extends Model
{
    use HasFactory;
    protected $primaryKey='id_temporada';
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
    ];

    public function scopefecha_inicio($query, $fecha_inicio) {
        if ($fecha_inicio) {
            return $query->where('fecha_inicio','like',"%$fecha_inicio%");
        }
    }

    public function scopefecha_fin($query, $fecha_fin) {
        if ($fecha_fin) {
            return $query->where('fecha_fin','like',"%$fecha_fin%");
        }
    }
}
