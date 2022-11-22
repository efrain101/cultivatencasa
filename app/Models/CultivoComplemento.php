<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CultivoComplemento extends Model
{
    use HasFactory;
    protected $table="cultivos_complementos";
    protected $primaryKey='id_cul_com';
    protected $fillable = [
        'id_cultivo',
        'id_complemento',
    ];
}
