<?php

use App\Models\alumnos;

test('manual edit flow', function () {
    // create a record
    $alumno = alumnos::factory()->create();

    // GET edit page
    // debug: ensure route generation works
    echo "route generate: " . route('alumnos.update', ['alumno' => $alumno->id]) . "\n";
    $response = $this->get('/alumnos/'.$alumno->id.'/edit');
    echo "GET /alumnos/{$alumno->id}/edit status: {$response->status()}\n";
    // print small snippet of content
    $content = $response->getContent();
    echo "HTML length: " . strlen($content) . "\n";

    // PUT update
    $response2 = $this->put('/alumnos/'.$alumno->id, [
        'codigo' => $alumno->codigo,
        'nombre' => 'NombreModificado',
        'apellido' => $alumno->apellido,
        'genero' => $alumno->genero,
        'carrera' => $alumno->carrera,
    ]);
    echo "PUT /alumnos/{$alumno->id} status: {$response2->status()}\n";

    // reload model and assert value changed
    $alumno->refresh();
    echo "Nombre after update: {$alumno->nombre}\n";
});
