<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cantidades_complementos extends Model
{
    use HasFactory;
    protected $table="cantidades_complementos";
    protected $primaryKey='id_cantidad';
    protected $fillable = [
        'cantidad',
    ];
}
