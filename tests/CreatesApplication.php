<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        // Force include the web routes for the test environment so resource routes
        // (for example the 'alumnos' resource) are registered when tests run.
        $routesFile = __DIR__ . '/../routes/web.php';
        if (file_exists($routesFile)) {
            // register routes under the 'web' middleware so session and other
            // web middlewares are applied during tests (StartSession, etc.)
            $router = $app->make(\Illuminate\Routing\Router::class);
            $router->middleware('web')->group($routesFile);
        }

        return $app;
    }
}
