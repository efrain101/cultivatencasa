<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plagas_prevenciones extends Model
{
    use HasFactory;
    protected $table="plagas_prevenciones";
    protected $primaryKey='id_plaga_prevencion';
    protected $fillable = [
        'id_plaga',
        'id_prevencion_plaga',
    ];
}
