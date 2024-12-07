<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table = 'salidas';
    protected $fillable = ['codigo', 'descripcion', 'fechasalida', 'cantidad'];
}