<?php
class Controller {
        protected function hasPermission($action, $resource) {
                if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
                        return false;
                }
                $db = new Database();
                $query = "SELECT 1 FROM role_permissions rp
                                    JOIN permissions p ON rp.permission_id = p.id
                                    WHERE rp.role_id = :role_id AND p.action = :action AND p.resource = :resource";
                $db->query($query);
                $db->bind(':role_id', $_SESSION['user']['role_id']);
                $db->bind(':action', $action);
                $db->bind(':resource', $resource);
                return $db->single() !== false;
        }

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

        protected function show_404($error) {
                header('HTTP/1.1 404 Not Found');
                $title = '404';
                $error = $error;
                require TEMPLATE_PATH . 'default/error/index.php';
                exit;
        }
}