<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctores';

    protected $primaryKey = 'id_doctor';

    protected $fillable = [
        'nombre',
        'edad',
        'especialidad',
        'estado',
        'correo',
        'celular',
    ];

    public $timestamps = false; 

    public $incrementing = true;

    protected $keyType = 'int';
}