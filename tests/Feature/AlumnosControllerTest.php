<?php

use App\Models\alumnos;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('muestra listado de alumnos', function () {
    $alumno = alumnos::factory()->create();

    $this->get('/alumnos')
        ->assertStatus(200)
        ->assertSeeInOrder(['ID', 'Nombre', 'Apellido', 'Genero', 'Correo', 'Carrera', 'Acciones'])
        ->assertSee($alumno->nombre);
});


test('muestra formulario de creación de alumno', function () {
    
    $this->withViewErrors([])
        ->get('/alumnos/create')
        ->assertStatus(200)
        ->assertSeeInOrder(['Código', 'Nombre', 'Apellido','Fecha de nacimiento' ,'Correo electrónico','', 'Género', 'Carrera',]);
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
        'fecha_nacimiento' => '11-01-2001',
        'correo' => 'testcorreo@example.com',
    ]);

    $this->post('/alumnos', $alumno->toArray())
        ->assertRedirect('/alumnos');

    $this->assertDatabaseHas('alumnos', [
        'codigo' => $alumno->codigo,
        'correo' => 'testcorreo@example.com',
        'fecha_nacimiento' => '11-01-2001',
    ]);

    $created = alumnos::where('codigo', $alumno->codigo)->first();

    // mostrar en la vista de inicio
    $this->get('/alumnos')
        ->assertStatus(200)
        ->assertSee('testcorreo@example.com')
        ->assertSee('11-01-2001');

    // poner el correo d manera correcta
    $this->assertEquals('testcorreo@example.com', $created->correo);
    $this->assertEquals('11-01-2001', $created->fecha_nacimiento);
});
