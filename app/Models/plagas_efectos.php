<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plagas_efectos extends Model
{
    use HasFactory;
    protected $table="plagas_efectos";
    protected $primaryKey='id_plaga_efecto';
    protected $fillable = [
        'id_plaga',
        'id_efecto_plaga',
    ];
}
