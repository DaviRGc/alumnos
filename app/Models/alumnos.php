<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumnos extends Model
{
    use HasFactory;
    // Allow mass assignment for these fields
    protected $fillable = [
        'codigo',
        'nombre',
        'apellido',
        'genero',
        'carrera',
    ];
}
