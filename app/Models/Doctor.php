<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'id_doctor';
    public $timestamps = true;

    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'telefono',
        'email',
        'estado',
    ];
}
