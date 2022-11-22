<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sustrato extends Model
{
    use HasFactory;
    protected $table="sustratos";
    protected $primaryKey='id_sustrato';
    protected $fillable = [
        'nombre',
        'composicion',
    ];
}
