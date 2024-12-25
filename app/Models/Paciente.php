<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes'; // Cambia esto si el nombre de la tabla es diferente
    protected $primaryKey = 'id_paciente'; // Cambia esto si el campo primario es diferente

    protected $fillable = [
        'nombre',
        'apellidom',
        'apellidop',
        'edad',
        'id_emergencia',
        'id_doctor',
    ];
    public $timestamps = false; 

    public function emergencia()
    {
        return $this->belongsTo(Emergencia::class, 'id_emergencia', 'id_emergencia');
    }

    public function doctores()
    {
        return $this->belongsTo(Doctor::class,  'id_paciente', 'id_doctor');
    }

        public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor', 'id_doctor'); // Verifica que los nombres de las columnas sean correctos
    }
}
