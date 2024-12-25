<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Emergencia extends Model
{
    use HasFactory;

    protected $table = 'emergencias'; // Cambia esto si el nombre de la tabla es diferente
    protected $primaryKey = 'id_emergencia'; // Cambia esto si el campo primario es diferente

    protected $fillable = [
        'detalle',
        'cantidad_pacientes',
        'fecha',
        'hora',
    ];
    public $timestamps = false; 
        public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'id_emergencia', 'id_emergencia');
    }

    public function doctores()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
