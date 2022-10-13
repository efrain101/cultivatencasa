<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesas_siembras extends Model
{
    use HasFactory;
    protected $table="mesas_siembras";
    protected $primaryKey='id_mesa_siembra';
    protected $fillable = [
        'id_cultivo',
        'id_mesa_cultivo',
        'id_status_siembra',
        'id_tamaño',
        'fecha_siembra',
        'fecha_cosecha',
    ];
}
