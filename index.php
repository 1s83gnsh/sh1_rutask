<?php
session_start();
// Загрузка конфигурации
require_once 'app/config.php';

// Автозагрузка классов
spl_autoload_register(function ($class) {
    $file = 'app/Libraries/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
        return;
    }
    $file = 'app/Controller/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
        return;
    }
    $file = 'app/Model/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
        return;
    }
});

// Запуск роутера
$router = new Router();
$router->dispatch();