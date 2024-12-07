<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salidas;
use Barryvdh\DomPDF\Facade\Pdf;

class SalidasController extends Controller
{
    public function index()
    {
        $registros = Salidas::all();

        return view('salidas', compact('registros'));
    }

    public function generarPDF()
    {
        $registros = Salidas::all();
        $pdf = Pdf::loadView('salidas_pdf', compact('registros'));
        return $pdf->download('reporte_salidas.pdf');
    }
}