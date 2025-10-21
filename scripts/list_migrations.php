<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$migs = DB::table('migrations')->orderBy('batch', 'desc')->orderBy('migration')->get();
foreach ($migs as $m) {
    echo $m->id . '\t' . $m->migration . '\t' . $m->batch . '\n';
}
