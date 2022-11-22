<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    use HasFactory;
    protected $table="ambientes";
    protected $primaryKey='id_ambiente';
    protected $fillable = [
        'tipo',
        'especificacion',
    ];
}
