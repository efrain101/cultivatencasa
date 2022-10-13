<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodos_crecimientos extends Model
{
    use HasFactory;
    protected $primaryKey='id_periodo';
    protected $fillable = [
        'rango_menor',
        'rango_mayor',
    ];

    public function scoperango_menor($query, $rango_menor) {
        if ($rango_menor) {
            return $query->where('rango_menor','like',"%$rango_menor%");
        }
    }

    public function scoperango_mayor($query, $rango_mayor) {
        if ($rango_mayor) {
            return $query->where('rango_mayor','like',"%$rango_mayor%");
        }
    }

}
