<?php
include_once __DIR__ . '/../model/Product.php';
include_once __DIR__ . '/../includes/db.php';

class ProductController {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products ORDER BY created_at DESC";
        $result = $this->conn->query($sql);
        $products = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = new Product($row);
            }
        }
        return $products;
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            return new Product($result->fetch_assoc());
        }
        return null;
    }

    public function addProduct($data) {
        $sql = "INSERT INTO products (name, description, category, price, stock, status, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssdis', $data['name'], $data['description'], $data['category'], $data['price'], $data['stock'], $data['status'], $data['image']);
        return $stmt->execute();
    }

    public function updateProduct($id, $data) {
        $sql = "UPDATE products SET name=?, description=?, category=?, price=?, stock=?, status=?, image=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssdisii', $data['name'], $data['description'], $data['category'], $data['price'], $data['stock'], $data['status'], $data['image'], $id);
        return $stmt->execute();
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
