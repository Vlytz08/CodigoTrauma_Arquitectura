<?php

namespace App\Http\Controllers;

use App\Models\Emergencia; // Asegúrate de tener este modelo
use Illuminate\Http\Request;

class HistorialEmergenciasController extends Controller
{
    public function index()
    {
        $emergencias = Emergencia::with('pacientes.doctor')->get();
            return view('historial.index', compact('emergencias'));
    }
}

