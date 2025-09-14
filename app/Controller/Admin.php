 <?php
class Admin extends Controller {
    public function index() {
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['role_id'], [(new Role)->getIdByName('admin'), (new Role)->getIdByName('administrator')])) {
            $this->show_404('Доступ запрещен');
        }
        $this->view('admin/users', ['users' => (new User)->findAll()]);
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'login' => $_POST['login'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'role_id' => $_POST['role_id']
            ];
            (new User)->create($data);
            header('Location: /admin');
        }
    }
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'phone' => $_POST['phone'],
                'email' => $_POST['email'],
                'role_id' => $_POST['role_id']
            ];
            (new User)->update($id, $data);
            header('Location: /admin');
        }
        $this->view('admin/edit', ['user' => (new User)->findById($id)]);
    }
    public function delete($id) {
        (new User)->delete($id);
        header('Location: /admin');
    }
    public function permissions($roleId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Обновить role_permissions
            $query = "DELETE FROM role_permissions WHERE role_id = :role_id";
            $db = new Database();
            $db->query($query);
            $db->bind(':role_id', $roleId);
            $db->execute();
            foreach ($_POST['permissions'] as $permId) {
                $query = "INSERT INTO role_permissions (role_id, permission_id) VALUES (:role_id, :permission_id)";
                $db->query($query);
                $db->bind(':role_id', $roleId);
                $db->bind(':permission_id', $permId);
                $db->execute();
            }
            header('Location: /admin');
        }
        $this->view('admin/permissions', ['role_id' => $roleId, 'permissions' => (new Role)->getPermissions($roleId)]);
    }
}