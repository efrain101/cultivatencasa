<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class erradicaciones_plagas_c extends Model
{
    use HasFactory;
    protected $table="erradicaciones_plagas_c";
    protected $primaryKey='id_erradicacion_plaga';
    protected $fillable = [
        'erradicacion',
    ];
}
