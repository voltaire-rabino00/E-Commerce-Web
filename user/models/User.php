<?php

class User {
    private $conn;

    public function__construct($conn) {
         $this->conn = $conn;
    }

    public function create($data) {
        $stmt = this->conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
        $stmt->bind_param("sss", $data['name'], $data['email'], $hashedPassword);
        return $stmt->execute();
    }
}