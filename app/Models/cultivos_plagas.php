<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cultivos_plagas extends Model
{
    use HasFactory;
    protected $table="cultivos_plagas";
    protected $primaryKey='id_cul_pla';
    protected $fillable = [
        'id_cultivo',
        'id_plaga',
    ];
}
