<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlagaErradicacion extends Model
{
    use HasFactory;
    protected $table="plagas_erradicaciones";
    protected $primaryKey='id_plaga_erradicacion';
    protected $fillable = [
        'id_plaga',
        'id_erradicacion_plaga',
    ];
}
