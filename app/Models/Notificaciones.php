<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    use HasFactory;
    protected $primaryKey='id_notificacion';
    protected $fillable = [
        'id_usuario',
        'id_mesa_cultivo',
        'fecha',
        'humedadsuelo',
    ];
}
