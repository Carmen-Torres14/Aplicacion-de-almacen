<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entradas;
use Barryvdh\DomPDF\Facade\Pdf;

class EntradasController extends Controller
{
    public function index()
    {
        $registros = Entradas::all();

        return view('entradas', compact('registros'));
    }

    public function generarPDF()
    {
        $registros = Entradas::all();
        $pdf = Pdf::loadView('entradas_pdf', compact('registros'));
        return $pdf->download('reporte_entradas.pdf');
    }
}
