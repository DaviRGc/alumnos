<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$schema = DB::select('DESCRIBE alumnos');
foreach ($schema as $col) {
    echo $col->Field . "\t" . $col->Type . "\t" . $col->Null . "\t" . $col->Key . "\t" . $col->Default . "\n";
}
