<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos_complementos extends Model
{
    use HasFactory;
    protected $table="tipos_complementos";
    protected $primaryKey='id_tipo';
    protected $fillable = [
        'nombre',
    ];
}
