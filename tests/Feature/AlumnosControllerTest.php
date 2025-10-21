<?php

use App\Models\alumnos;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('muestra listado de alumnos', function () {
    $alumno = alumnos::factory()->create();

    $this->get('/alumnos')
        ->assertStatus(200)
        ->assertSeeInOrder(['ID', 'Nombre', 'Apellido', 'Género', 'Carrera', 'Acciones'])
        ->assertSee($alumno->nombre);
});

test('muestra formulario de creación de alumno', function () {
    // Ensure $errors is present in the view (some blades reference it directly)
    $this->withViewErrors([])
        ->get('/alumnos/create')
        ->assertStatus(200)
        ->assertSeeInOrder(['Código', 'Nombre', 'Apellido', 'Género', 'Carrera', 'Guardar']);
});

test('crea un alumno', function () {
    $alumno = alumnos::factory()->make();

    $this->post('/alumnos', $alumno->toArray())
        ->assertRedirect('/alumnos');

    $this->assertDatabaseHas('alumnos', [
        'codigo' => $alumno->codigo,
    ]);
});

test('verifica errores al crear alumno', function () {
    $alumno = alumnos::factory()->make([
        'codigo' => '',
        'nombre' => '',
        'apellido' => '',
        'genero' => '',
        'carrera' => '',
    ]);

    $this->post('/alumnos', $alumno->toArray())
        ->assertInvalid(['codigo', 'nombre', 'apellido', 'genero', 'carrera']);

    $this->assertDatabaseMissing('alumnos', [
        'nombre' => $alumno->nombre,
    ]);
});
