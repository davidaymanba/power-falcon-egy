<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Fix Public Path (Important for Hostinger deployment)
|--------------------------------------------------------------------------
| Since we moved public content into public_html,
| we must tell Laravel that this is the public directory.
*/
$app = require_once __DIR__.'/bootstrap/app.php';

$app->usePublicPath(__DIR__);

// Bootstrap Laravel and handle the request...
$app->handleRequest(Request::capture());