
<?php

require_once __DIR__ .'/../includes/db.php';
require_once __DIR__ .'/../models/User.php';

class AuthController {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
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

if ($_POST['submit'] === 'register') {
    $auth->register($_POST);
    header('Location: /login.php');
}

if ($_POST['submit'] === 'login') {
    if ($auth->login($_POST)) {
        header('Location: /dashboard.php');
    } else {
        echo "Login failed. Invalid credentials.";
    }
}