<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Illuminate\Http\Request;

use function Laravel\Prompts\table;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = alumnos::all();
        return view('alumnos.alumnos', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                return view('alumnos.create-alumnos');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:alumnos,codigo',
            'nombre' => 'required',
            'apellido' => 'required',
            'genero' => 'required',
            'carrera' => 'required',
            'fecha_nacimiento' => 'required|date',
            'correo' => 'required|email|unique:alumnos,correo',
        ]);

        $alumnos = new alumnos();
        $alumnos->codigo = $request->input('codigo');
        $alumnos->nombre = $request->input('nombre');
        $alumnos->apellido = $request->input('apellido');
        $alumnos->genero = $request->input('genero');
        $alumnos->carrera = $request->input('carrera');
        $alumnos->fecha_nacimiento = $request->input('fecha_nacimiento');
        $alumnos->correo = $request->input('correo');
        $alumnos->save();

        return redirect()->route('alumnos.index');
    }

    
    public function show(alumnos $alumno)
    {
                return view('alumnos.show-alumnos', compact('alumno'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alumnos $alumno)
    {
                return view('alumnos.edit-alumnos', compact('alumno'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, alumnos $alumno)
    {
         $request->validate([
            'codigo' => 'required|unique:alumnos,codigo,'.$alumno->id,
            'nombre' => 'required',
            'apellido' => 'required',
            'genero' => 'required',
            'carrera' => 'required',
            'fecha_nacimiento' => 'required|date',
            // allow the current alumno's correo when updating
            'correo' => 'required|email|unique:alumnos,correo,'.$alumno->id,
        ]);
        $alumno->codigo = $request->codigo;
        $alumno->nombre = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->genero = $request->genero;
        $alumno->carrera = $request->carrera;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->correo = $request->correo;
        $alumno->save();
        return redirect('/alumnos/'.$alumno->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alumnos $alumno)
    {
         $alumno->delete();
        return redirect('/alumnos');
    }
}
