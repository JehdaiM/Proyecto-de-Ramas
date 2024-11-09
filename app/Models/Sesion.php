<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $table = 'sesion'; // Define el nombre de la tabla

    protected $fillable = ['name', 'email', 'password']; // Define los campos que pueden ser asignados masivamente
}
