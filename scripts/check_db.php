<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
echo "default:" . config('database.default') . PHP_EOL;
echo "database:" . config('database.connections.' . config('database.default') . '.database') . PHP_EOL;
echo "host:" . config('database.connections.' . config('database.default') . '.host') . PHP_EOL;
echo "user:" . config('database.connections.' . config('database.default') . '.username') . PHP_EOL;
