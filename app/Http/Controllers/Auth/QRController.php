<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Http\Controllers\Controller;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Reader\QrReader;

class QRController extends Controller
{
    public function create()
    {
        return view('codigoqr');
    }

    public function scanQR(Request $request)
    {
        $validatedData = $request->validate([
            'qrData' => 'required|string',
        ]);

        $qrData = $validatedData['qrData'];
        $material = Material::where('codigoqr', $qrData)->first();

        if ($material) {
            return response()->json(['status' => 'success', 'material' => $material]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Material no encontrado.']);
        }
    }

    public function updateStock(Request $request, Material $material)
    {
        $validatedData = $request->validate([
            'action' => 'required|string|in:entradas,salidas',
            'quantity' => 'required|integer|min:1',
        ]);

        $quantity = $validatedData['quantity'];

        if ($validatedData['action'] === 'entradas') {
            $material->existencia += $quantity;
        } else {
            $material->existencia -= $quantity;
        }

        $material->save();

        return redirect()->route('codigoqr')->with('success', 'Stock actualizado correctamente.');
    }
}