<?php
// Базовый контроллер
class Controller {
    // Загрузка представления с шаблоном
    public function view($view, $data = [], $template = DEFAULT_TEMPLATE) {
        extract($data);
        $view_file = TEMPLATE_PATH . $template . '/' . $view . '/index.php';
        $template_file = TEMPLATE_PATH . $template . '/layout.php';
        if (!file_exists($view_file)) {
            header('HTTP/1.1 404 Not Found');
            $title = '404';
            $error = 'Представление не найдено';
            require TEMPLATE_PATH . $template . '/error/index.php';
            exit;
        }
        if (!file_exists($template_file)) {
            header('HTTP/1.1 404 Not Found');
            $title = '404';
            $error = 'Шаблон не найден';
            require TEMPLATE_PATH . $template . '/error/index.php';
            exit;
        }
        require $template_file;
    }
}