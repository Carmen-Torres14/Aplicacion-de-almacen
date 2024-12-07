<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo', 'almacen', 'tipo', 'ubicacion', 'descripcion', 'existencia', 'unidad', 'codigoqr'
    ];
}

