<?php
// Контроллер главной страницы
require_once __DIR__ . '/../Libraries/Controller.php';
class Auth extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $user = (new User)->findByLogin($login);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                header('Location: /');
                exit;
            }
            $this->view('error', ['error' => 'Неверный логин или пароль']);
        }
        $this->view('auth/login');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $userModel = new User();
            if ($userModel->findByLogin($login)) {
                $this->view('error', ['error' => 'Логин занят']);
            } else {
                $userId = $userModel->create([
                    'login' => $login,
                    'password' => $password,
                    'role_id' => (new Role)->getIdByName('user'),
                    'first_name' => '',
                    'last_name' => '',
                    'phone' => null,
                    'email' => null
                ]);
                $_SESSION['user'] = $userModel->findById($userId);
                header('Location: /profile'); // Перенаправление на профиль после регистрации
                exit;
            }
        }
        $this->view('auth/register');
    }

    public function logout() {
        session_destroy();
        header('Location: /');
        exit;
    }
}