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
        ]);
        $alumnos= new alumnos();
        $alumnos->codigo=$request->input('codigo');
        $alumnos->nombre=$request->input('nombre');
        $alumnos->apellido=$request->input('apellido');
        $alumnos->genero=$request->input('genero');
        $alumnos->carrera=$request->input('carrera');
        $alumnos->save();
        return redirect('/alumnos');
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
            //'codigo' => 'required|unique:alumnos,codigo,'.$alumnos->id,
            'nombre' => 'required',
            'apellido' => 'required',
            'genero' => 'required',
            'carrera' => 'required',
        ]);
        $alumno->codigo = $request->codigo;
        $alumno->nombre = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->genero = $request->genero;
        $alumno->carrera = $request->carrera;
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
