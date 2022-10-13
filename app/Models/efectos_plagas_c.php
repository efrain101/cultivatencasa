<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class efectos_plagas_c extends Model
{
    use HasFactory;
    protected $table="efectos_plagas_c";
    protected $primaryKey='id_efecto_plaga';
    protected $fillable = [
        'efecto',
    ];
}
