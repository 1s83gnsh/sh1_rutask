<?php
// Конфигурация: пути и настройки БД
define('VIEW_PATH', __DIR__ . '/Views/');
define('PUBLIC_PATH', __DIR__ . '/../public/');
define('TEMPLATE_PATH', VIEW_PATH . 'templates/');
define('DEFAULT_TEMPLATE', 'default');

$db_config = [
    'server' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'dbname' => 'sh1',
    'driver' => 'mysql'
];