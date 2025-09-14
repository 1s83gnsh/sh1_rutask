<?php
// Класс роутера
class Router {
    // Разбор и выполнение маршрута
    public function dispatch() {
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        $uri = trim(parse_url($uri, PHP_URL_PATH), '/');
        $parts = $uri ? explode('/', $uri) : [];

        $controller = $parts[0] ?? 'Home';
        $method = $parts[1] ?? 'index';
        $params = array_slice($parts, 2);

        $controller = ucfirst(strtolower($controller));
        $file = "app/Controller/$controller.php";

        if (!file_exists($file)) {
            $this->show_404('Контроллер не найден');
        }

        require $file;
        if (!class_exists($controller)) {
            $this->show_404('Класс контроллера не найден');
        }

        $instance = new $controller();
        if (!method_exists($instance, $method)) {
            $this->show_404('Метод не найден');
        }

        $instance->$method(...$params);
    }

    // Отображение 404
    private function show_404($error) {
        header('HTTP/1.1 404 Not Found');
        $title = '404';
        $error = $error;
        require TEMPLATE_PATH . 'default/error/index.php';
        exit;
    }
}