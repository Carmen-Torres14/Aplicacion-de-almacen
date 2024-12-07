<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Salida;
use App\Models\Material;

class SalidaController extends Controller
{
    public function showSalidaForm(Request $request)
    {
        $material = null;
        if ($request->has('qrData')) {
            $material = Material::where('codigoqr', $request->qrData)->first();
        }
        return view('salida', compact('material'));
    }

    public function storeSalida(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string',
            'tipo' => 'required|string',
            'descripcion' => 'required|string',
            'unidad' => 'required|string',
            'salidas' => 'required|integer',
            'fechasalida' => 'required|date',
            'responsablesalida' => 'required|string',
            'destinosalida' => 'required|string',
        ]);

        $salida = new Salida();
        $salida->codigo = $validated['codigo'];
        $salida->tipo = $validated['tipo'];
        $salida->descripcion = $validated['descripcion'];
        $salida->unidad = $validated['unidad'];
        $salida->salidas = $validated['salidas'];
        $salida->fechasalida = $validated['fechasalida'];
        $salida->responsablesalida = $validated['responsablesalida'];
        $salida->destinosalida = $validated['destinosalida'];
        $salida->save();

        // Actualizar inventario
        $material = Material::where('codigoqr', $salida->codigo)->first();
        if ($material) {
            $material->existencia -= $salida->salidas;
            $material->save();
        }

        return redirect()->route('salida')->with('success', 'Salida registrada con éxito');
    }
}
