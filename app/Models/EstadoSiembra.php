<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoSiembra extends Model
{
    use HasFactory;
    protected $table="estados_siembras";
    protected $primaryKey='id_status_siembra';
    protected $fillable = [
        'estado',
    ];
}

