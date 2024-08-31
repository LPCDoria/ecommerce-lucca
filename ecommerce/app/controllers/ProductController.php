<?php
include_once '../config/database.php';

class ProductController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listProducts() {
        $sql = "SELECT * FROM products";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $price) {
        $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['name' => $name, 'price' => $price]);
    }

    public function getProduct($id) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $price) {
        $sql = "UPDATE products SET name = :name, price = :price WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['name' => $name, 'price' => $price, 'id' => $id]);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
?>