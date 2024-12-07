<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Http\Controllers\Controller;

class InventarioController extends Controller
{
    public function index()
    {
        $materiales = Material::all();
        return view('inventario', compact('materiales'));
    }

    public function edit($id)
    {
        $material = Material::find($id);
        return view('editarmaterial', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $material = Material::find($id);
        $material->codigo = $request->codigo;
        $material->almacen = $request->almacen;
        $material->tipo = $request->tipo;
        $material->ubicacion = $request->ubicacion;
        $material->descripcion = $request->descripcion;
        $material->existencia = $request->existencia;
        $material->unidad = $request->unidad;
        $material->save();

        return redirect()->route('inventario.index')->with('success', 'Material actualizado exitosamente');
    }

    public function destroy($id)
    {
        $material = Material::find($id);
        if ($material) {
            $material->delete();
            return redirect()->route('inventario.index')->with('success', 'Material eliminado exitosamente');
        } else {
            return redirect()->route('inventario.index')->with('error', 'Material no encontrado');
        }
    }
}
