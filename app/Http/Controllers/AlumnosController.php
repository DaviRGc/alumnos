<?php

namespace App\Http\Controllers;

use App\Models\alumnos;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $alumnos= new alumnos();
        $alumnos->id=$request->input('id');
        $alumnos->codigo=$request->input('codigo');
        $alumnos->nombre=$request->input('nombre');
        $alumnos->apellido=$request->input('apellido');
        $alumnos->genero=$request->input('genero');
        $alumnos->carrera=$request->input('carrera');
        $alumnos->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(alumnos $alumnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alumnos $alumnos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, alumnos $alumnos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alumnos $alumnos)
    {
        //
    }
}
