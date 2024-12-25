<?php

namespace App\Http\Controllers;
use App\Models\Emergencia;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;




class EmergenciaController extends Controller
{
        public function create()
        {
        $doctores = Doctor::where('estado', 1)
        ->orderBy('especialidad')
        ->get(); 
        return view('registro', compact('doctores'));
        }
    


    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nombre' => 'required|array',
            'nombre.*' => 'required|string|max:255', 
            'apellidom' => 'required|array',
            'apellidom.*' => 'required|string|max:255',
            'apellidop' => 'required|array',
            'apellidop.*' => 'required|string|max:255',
            'edad' => 'required|array',
            'edad.*' => 'required|integer|min:0', 
            'doctores.*' => 'required|integer|exists:doctores,id_doctor',
        ]);
       
        // Guardar la emergencia
        $emergencia = Emergencia::create([
            'detalle' => $request->detalle,
            'cantidad_pacientes' => $request->cantidad_pacientes,
            'fecha' => now()->toDateString(),
            'hora' => now()->toTimeString(),
        ]);
        
      
      if (isset($request->nombre) && is_array($request->nombre)) {
        foreach ($request->nombre as $index => $nombre) {
            // Crear el paciente
            $paciente = Paciente::create([
                'nombre' => $nombre,
                'apellidom' => $request->apellidom[$index],
                'apellidop' => $request->apellidop[$index],
                'edad' => $request->edad[$index],
                'id_emergencia' => $emergencia->id_emergencia,
                'id_doctor' => $validated['doctores'][$index],
            ]);
            Doctor::where('id_doctor', $validated['doctores'][$index])
                ->update(['estado' => 2]);
        }
    } else {
        return response()->json(['error' => 'No se recibieron nombres de pacientes.'], 400);
    }
    
         return redirect()->route('historial.emergencias.index')->with('success', 'Emergencia registrada correctamente.');
    }


}
