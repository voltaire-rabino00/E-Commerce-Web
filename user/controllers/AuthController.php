<?php

require_once './user/includes/db.php';
require_once './user/models/User.php';

class AuthController {
    private $conn;
    public function __construct($conn) {
        $this->conn = $dbConnection;
    }

    public function register ($data) {
        $user = new User($this->conn);
        return $user->create($data);
    }

    public function login($data) {
        $user = new User($this->conn);
        return $user->authenticate($data);
    }
}
