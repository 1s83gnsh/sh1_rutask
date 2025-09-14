<?php
class Database {
    private $conn;
    private $stmt;

    public function __construct() {
        global $db_config;
        try {
            $dsn = "{$db_config['driver']}:host={$db_config['server']};dbname={$db_config['dbname']}";
            $this->conn = new PDO($dsn, $db_config['user'], $db_config['pass']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($query) {
        $this->stmt = $this->conn->prepare($query);
    }

    public function bind($param, $value) {
        $this->stmt->bindValue($param, $value);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch();
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    public function lastInsertId() {
        return $this->conn->lastInsertId();
    }
}