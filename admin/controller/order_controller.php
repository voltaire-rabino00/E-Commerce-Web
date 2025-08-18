<?php
include_once __DIR__ . '/../model/Order.php';
include_once __DIR__ . '/../includes/db.php';

class OrderController {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllOrders() {
        $sql = "SELECT * FROM orders ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        $orders = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $orders[] = new Order($row);
            }
        }
        return $orders;
    }

    public function getOrderById($id) {
        $sql = "SELECT * FROM orders WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return new Order($result->fetch_assoc());
        }
        return null;
    }

    public function addOrder($data) {
        $sql = "INSERT INTO orders (name, email, total_amount, payment_method, payment_status, order_status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssdssss', $data['name'], $data['email'], $data['total_amount'], $data['payment_method'], $data['payment_status'], $data['order_status'], $data['created_at']);
        return $stmt->execute();
    }
}