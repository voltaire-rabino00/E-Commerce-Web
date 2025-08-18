<?php
class Order {
    public $id;
    public $name;
    public $email;
    public $totalAmount;
    public $paymentMethod;
    public $paymentStatus;
    public $orderStatus;
    public $createdAt;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->totalAmount = $data['total_amount'] ?? 0.0;
        $this->paymentMethod = $data['payment_method'] ?? null;
        $this->paymentStatus = $data['payment_status'] ?? 'Unpaid';
        $this->orderStatus = $data['order_status'] ?? 'Pending';
        $this->createdAt = $data['created_at'] ?? date('Y-m-d H:i:s');
    }
}
