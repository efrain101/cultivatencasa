<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plagas extends Model
{
    use HasFactory;
    protected $primaryKey='id_plaga';
    protected $fillable = [
        'nombre',
        'id_tipo_plaga',
    ];
}
