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
            // include directly to register routes on the Router
            require $routesFile;
        }

        return $app;
    }
}
