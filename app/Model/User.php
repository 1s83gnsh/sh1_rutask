<?php
require_once __DIR__ . '/../Libraries/Model.php';

class User {
    private $db;
    public function __construct() {
        $this->db = new Database(); // Предполагается наличие Database.php
    }
    public function findByLogin($login) {
        $query = "SELECT * FROM users WHERE login = :login";
        $this->db->query($query);
        $this->db->bind(':login', $login);
        return $this->db->single();
    }
    public function findById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function create($data) {
        $query = "INSERT INTO users (login, password, role_id) VALUES (:login, :password, :role_id)";
        $this->db->query($query);
        $this->db->bind(':login', $data['login']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role_id', $data['role_id']);
        $this->db->execute();
        return $this->db->lastInsertId();
    }
    public function update($id, $data) {
        $query = "UPDATE users SET first_name = :first_name, last_name = :last_name, phone = :phone, email = :email WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':email', $data['email']);
        return $this->db->execute();
    }
    public function delete($id) {
        $query = "DELETE FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}