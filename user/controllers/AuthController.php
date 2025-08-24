
<?php

require_once __DIR__ .'../E-Commerce-Web/user/includes/db.php';
require_once __DIR__ .'../E-Commerce-Web/user/models/User.php';

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

$auth = new AuthController($conn);

if ($_GET['action'] === 'register') {
    $auth->register($_POST);
    header('Location: /login.php');
}

if ($_GET['action'] === 'login') {
    if ($auth->login($_POST)) {
        header('Location: /dashboard.php');
    } else {
        echo "Login failed. Invalid credentials.";
    }
}