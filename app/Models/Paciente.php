<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';

    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'email',
        'password',
        'telefono',
        'direccion',
    ];

    protected $hidden = [
        'password',
    ];
}
