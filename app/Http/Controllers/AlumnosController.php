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
        // id is auto-increment, no need to set it manually
        $alumnos->codigo=$request->input('codigo');
        $alumnos->nombre=$request->input('nombre');
        $alumnos->apellido=$request->input('apellido');
        $alumnos->genero=$request->input('genero');
        $alumnos->carrera=$request->input('carrera');
        $alumnos->save();
        return redirect('/alumnos');
    }

    /**
     * Display the specified resource.
     */
    public function show(alumnos $alumnos)
    {
                return view('alumnos.show-alumnos', compact('alumnos'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alumnos $alumnos)
    {
                return view('alumnos.edit-alumnos', compact('alumnos'));

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, alumnos $alumnos)
    {
         $request->validate([
            //'codigo' => 'required|unique:alumnos,codigo,'.$alumnos->id,
            'nombre' => 'required',
            'apellido' => 'required',
            'genero' => 'required',
            'carrera' => 'required',
        ]);
        $alumnos->codigo = $request->codigo;
        $alumnos->nombre = $request->nombre;
        $alumnos->apellido = $request->apellido;
        $alumnos->genero = $request->genero;
        $alumnos->carrera = $request->carrera;
        $alumnos->save();
        return redirect('/alumnos/'.$alumnos->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alumnos $alumnos)
    {
         $alumnos->delete();
        return redirect('/alumnos');
    }
}
