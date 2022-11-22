<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;
    protected $primaryKey='id_mantenimiento';
    protected $fillable = [
        'periodicidad',
        'descripcion',
    ];

    public function scopeperiodicidad($query, $periodicidad) {
        if ($periodicidad) {
            return $query->where('periodicidad','like',"%$periodicidad%");
        }
    }

    public function scopedescripcion($query, $descripcion) {
        if ($descripcion) {
            return $query->where('descripcion','like',"%$descripcion%");
        }
    }

}
