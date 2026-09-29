<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

require __DIR__.'/../vendor/autoload.php';

// Prevent Vercel's build-time cached absolute paths from breaking the runtime
$_SERVER['APP_SERVICES_CACHE'] = '/tmp/storage/bootstrap/cache/services.php';
$_SERVER['APP_PACKAGES_CACHE'] = '/tmp/storage/bootstrap/cache/packages.php';
$_SERVER['APP_CONFIG_CACHE'] = '/tmp/storage/bootstrap/cache/config.php';
$_SERVER['APP_ROUTES_CACHE'] = '/tmp/storage/bootstrap/cache/routes.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// Change storage path to /tmp for Vercel
$app->useStoragePath('/tmp/storage');

// Create necessary directories in /tmp
$storagePath = $app->storagePath();
foreach (['/framework/views', '/framework/cache/data', '/framework/sessions', '/logs', '/bootstrap/cache'] as $dir) {
    if (!is_dir($storagePath . $dir)) {
        mkdir($storagePath . $dir, 0777, true);
    }
}

$app->handleRequest(Request::capture());
