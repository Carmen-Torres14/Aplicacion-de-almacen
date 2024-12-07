<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{
    public function create()
    {
        return view('materiales');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:255',
            'almacen' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'existencia' => 'required|integer',
            'unidad' => 'required|string|max:255',
            'codigoqr' => 'required|string|max:255',
        ]);

        Material::create($validatedData);

        return redirect()->route('inventario.index')->with('success', 'Material registrado exitosamente.');
    }
}


