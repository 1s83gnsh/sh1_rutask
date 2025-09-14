<?php
require_once __DIR__ . '/../Libraries/Model.php';

class Role {
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function getIdByName($name) {
        $query = "SELECT id FROM roles WHERE name = :name";
        $this->db->query($query);
        $this->db->bind(':name', $name);
        return $this->db->single()['id'];
    }
    public function getPermissions($roleId) {
        $query = "SELECT p.action, p.resource FROM permissions p JOIN role_permissions rp ON p.id = rp.permission_id WHERE rp.role_id = :role_id";
        $this->db->query($query);
        $this->db->bind(':role_id', $roleId);
        return $this->db->resultSet();
    }
}