<?php
class Database {
    private $pdo;

    public function getConnection() {
        if ($this->pdo === null) {
            $dsn = "mysql:host=db;dbname=store_api";
            $user = "user";
            $password = "password";
            try {
                $this->pdo = new PDO($dsn, $user, $password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}
