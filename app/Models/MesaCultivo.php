<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesaCultivo extends Model
{
    use HasFactory;
    protected $table="mesas_cultivos";
    protected $primaryKey='id_mesa_cultivo';
    protected $fillable = [
        'id_usuario',
        'nombre',
        'id_sustrato',
        'id_dimension',
        'imagen',
    ];
}
