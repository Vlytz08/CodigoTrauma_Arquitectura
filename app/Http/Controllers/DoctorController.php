<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all(); // Recupera todos los doctores de la base de datos
        return view('doctors.index', compact('doctors')); // Pasa los doctores a la vista
    }


    public function update(Request $request, $id)
    {
        // Busca el doctor por su ID
        $doctor = Doctor::findOrFail($id);
    
        // Cambiar el estado a 'disponible'
        $doctor->estado = 1;
        $doctor->save();
    
        // Redirigir de vuelta a la lista de doctores
        return redirect()->route('doctors.index')->with('success', 'El estado del doctor ha sido actualizado a Disponible.');
    }
    

}