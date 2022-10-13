<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complementos extends Model
{
    use HasFactory;
    protected $table="complementos";
    protected $primaryKey='id_complemento';
    protected $fillable = [
        'nombre',
        'id_tipo',
        'descripcion',
        'id_cantidad',
    ];
}
