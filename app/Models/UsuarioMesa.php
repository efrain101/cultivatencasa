<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioMesa extends Model
{
    use HasFactory;
    protected $table="usuarios_mesas";
    protected $primaryKey='id_usuario_mesa';
    protected $fillable = [
        'id_mesa_cultivo',
        'id_usuario',
    ];
}
