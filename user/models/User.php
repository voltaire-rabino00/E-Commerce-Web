<?php

class User {
    private $conn;

    public function __construct($conn) {
         $this->conn = $conn;
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
        $stmt->bind_param("sss", $data['name'], $data['email'], $hashedPassword);
        return $stmt->execute();
    }

    public function authenticate($data) {
        $stmt = $this->conn->prepare("Select * FROM users WHERE email = ?");
        $stmt->bind_param("s", $data['email']);
        $stmt->execute();
        $result = $stmt->get_result(); 
        $user = $result->fetch_assoc();

        if ($user && password_verify($data['password'], $user['password'])) {
            return true;
        }
        return false;
    }
}