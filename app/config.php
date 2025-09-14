<?php
define('BASE_PATH', dirname(__DIR__));
define('VIEW_PATH', BASE_PATH . '/app/views');
define('PUBLIC_PATH', BASE_PATH . '/public');

$db_config = [
    'server' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'dbname' => 'sh1',
    'driver' => 'mysql'
];