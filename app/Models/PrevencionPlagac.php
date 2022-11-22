<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrevencionPlagac extends Model
{
    use HasFactory;
    protected $table="prevenciones_plagas_c";
    protected $primaryKey='id_prevencion_plaga';
    protected $fillable = [
        'prevencion',
    ];
}
