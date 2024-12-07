<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Material;

class EntradaController extends Controller
{
    public function showEntradaForm(Request $request)
    {
        $material = null;
        if ($request->has('qrData')) {
            $material = Material::where('codigoqr', $request->qrData)->first();
        }
        return view('entrada', compact('material'));
    }

    public function storeEntrada(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string',
            'tipo' => 'required|string',
            'descripcion' => 'required|string',
            'unidad' => 'required|string',
            'entradas' => 'required|integer',
            'fechaentrada' => 'required|date',
        ]);

        $entrada = new Entrada();
        $entrada->codigo = $validated['codigo'];
        $entrada->tipo = $validated['tipo'];
        $entrada->descripcion = $validated['descripcion'];
        $entrada->unidad = $validated['unidad'];
        $entrada->entradas = $validated['entradas'];
        $entrada->fechaentrada = $validated['fechaentrada'];
        $entrada->save();

        // Actualizar inventario
        $material = Material::where('codigoqr', $entrada->codigo)->first();
        if ($material) {
            $material->existencia += $entrada->entradas;
            $material->save();
        }

        return redirect()->route('entrada')->with('success', 'Entrada registrada con éxito');
    }
}
