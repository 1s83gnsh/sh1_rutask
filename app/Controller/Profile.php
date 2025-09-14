<?php
class Profile extends Controller {
    public function index() {
        if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
            error_log("Отладка: Нет авторизации или некорректные данные в сессии.");
            header('Location: /');
            exit;
        }

        // Отладка: вывести текущие данные сессии
        error_log("Отладка: Текущий пользователь в сессии: " . print_r($_SESSION['user'], true));

        // Если данные неполные, загрузим их заново из базы
        if (empty($_SESSION['user']['login']) || empty($_SESSION['user']['first_name'])) {
            $userModel = new User();
            $_SESSION['user'] = $userModel->findById($_SESSION['user']['id']);
            error_log("Отладка: Данные сессии обновлены из базы: " . print_r($_SESSION['user'], true));
        }

        $successMessage = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'phone' => $_POST['phone'] ?? null,
                'email' => $_POST['email'] ?? null
            ];
            error_log("Отладка: Полученные данные из POST: " . print_r($data, true));
            (new User)->update($_SESSION['user']['id'], $data);
            $_SESSION['user'] = (new User)->findById($_SESSION['user']['id']);
            error_log("Отладка: Обновлённые данные в сессии: " . print_r($_SESSION['user'], true));
            $_SESSION['profile_updated'] = true; // Устанавливаем флаг успеха
        }

        // Очищаем флаг после отображения
        if (isset($_SESSION['profile_updated'])) {
            $successMessage = 'Данные успешно записаны.';
            unset($_SESSION['profile_updated']);
        }

        $this->view('profile', array_merge($_SESSION['user'], ['success_message' => $successMessage]));
    }
}