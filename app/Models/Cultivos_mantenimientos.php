<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivos_mantenimientos extends Model
{
    use HasFactory;
    protected $table="cultivos_mantenimientos";
    protected $primaryKey='id_cul_man';
    protected $fillable = [
        'id_cultivo',
        'id_mantenimiento',
    ];
}
