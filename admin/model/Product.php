<?php
class Product {
    public $id;
    public $name;
    public $description;
    public $category;
    public $price;
    public $stock;
    public $status;
    public $image;

    public function __construct($data) {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->category = $data['category'] ?? '';
        $this->price = $data['price'] ?? 0;
        $this->stock = $data['stock'] ?? 0;
        $this->status = $data['status'] ?? 'inactive';
        $this->image = $data['image'] ?? '';
    }
}
