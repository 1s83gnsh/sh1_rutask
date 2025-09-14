<?php
require_once 'Database.php';

class Model {
    protected $conn;
    protected $error;

    public function __construct() {
        global $db_config;
        try {
            $dsn = "mysql:host={$db_config['server']};dbname={$db_config['dbname']}";
            $this->conn = new PDO($dsn, $db_config['user'], $db_config['pass']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function getItem($query, $inputs = null) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($inputs);
            return $stmt->fetch();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function getItems($query, $inputs = null) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($inputs);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function exec($query, $inputs = null) {
        try {
            $stmt = $this->conn->prepare($query);
            return $stmt->execute($inputs);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function getError() {
        return $this->error;
    }
}