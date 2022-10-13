<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimensiones extends Model
{
    use HasFactory;
    protected $primaryKey='id_dimension';
    protected $fillable = [
        'altura',
        'ancho',
        'largo',
    ];


    public function scopealtura($query, $altura) {
        if ($altura) {
            return $query->where('altura','like',"%$altura%");
        }
    }

    public function scopeancho($query, $ancho) {
        if ($ancho) {
            return $query->where('ancho','like',"%$ancho%");
        }
    }

    public function scopelargo($query, $largo) {
        if ($largo) {
            return $query->where('largo','like',"%$largo%");
        }
    }

}
