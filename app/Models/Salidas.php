<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salidas extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'tipo',
        'descripcion',
        'unidad',
        'entradas',
        'fecha_entrada',
        'almacen',
        'salidas',
        'fecha_salida',
        'responsable_salida',
        'destino_salida',
    ];
}