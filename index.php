<?php
require_once 'app/config.php';

spl_autoload_register(function ($class) {
    $paths = [
        'app/Libraries/' . $class . '.php',
        'app/Controller/' . $class . '.php',
        'app/Model/' . $class . '.php'
    ];
    foreach ($paths as $file) {
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
});

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

if ($uri === '') {
    $controller = new Home();
} else {
    die('Route not found');
}