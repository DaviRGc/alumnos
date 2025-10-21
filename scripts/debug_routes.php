<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

try {
    // Force include the web routes and capture any exceptions
    $routesFile = __DIR__ . '/../routes/web.php';
    if (! file_exists($routesFile)) {
        echo "routes file missing\n";
        exit(1);
    }
    include $routesFile;
    echo "included routes file OK\n";
    echo Illuminate\Support\Facades\Route::has('alumnos.index') ? "route yes\n" : "route no\n";
    echo "-- listing routes containing 'alumnos' --\n";
    foreach (Illuminate\Support\Facades\Route::getRoutes() as $route) {
        $uri = $route->uri();
        $name = $route->getName();
        if (str_contains($uri, 'alumnos') || ($name && str_contains($name, 'alumnos'))) {
            echo ($name ?? '[noname]') . ' -> ' . $uri . "\n";
        }
    }
} catch (Throwable $e) {
    echo "Caught throwable: " . get_class($e) . " - " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
