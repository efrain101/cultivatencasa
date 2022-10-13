<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperaturas extends Model
{
    use HasFactory;
    protected $primaryKey='id_temperatura';
    protected $fillable = [
        'valor_minimo',
        'valor_maximo',
    ];

    public function scopevalor_minimo($query, $valor_minimo) {
        if ($valor_minimo) {
            return $query->where('valor_minimo','like',"%$valor_minimo%");
        }
    }

    public function scopevalor_maximo($query, $valor_maximo) {
        if ($valor_maximo) {
            return $query->where('valor_maximo','like',"%$valor_maximo%");
        }
    }

}
