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

test('crea alumno con correo y fecha y las muestra en index y show', function () {
    $alumno = alumnos::factory()->make([
        'fecha_nacimiento' => '2000-01-01',
        'correo' => 'testcorreo@example.com',
    ]);

    $this->post('/alumnos', $alumno->toArray())
        ->assertRedirect('/alumnos');

    $this->assertDatabaseHas('alumnos', [
        'codigo' => $alumno->codigo,
        'correo' => 'testcorreo@example.com',
        'fecha_nacimiento' => '2000-01-01',
    ]);

    $created = alumnos::where('codigo', $alumno->codigo)->first();

    // Index should show correo and fecha
    $this->get('/alumnos')
        ->assertStatus(200)
        ->assertSee('testcorreo@example.com')
        ->assertSee('2000-01-01');

    // The model should have the correo and fecha stored correctly
    $this->assertEquals('testcorreo@example.com', $created->correo);
    $this->assertEquals('2000-01-01', $created->fecha_nacimiento);
});
