<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlagac extends Model
{
    use HasFactory;
    protected $table="tipos_plagas_c";
    protected $primaryKey='id_tipo_plaga';
    protected $fillable = [
        'tipo',
    ];
}
