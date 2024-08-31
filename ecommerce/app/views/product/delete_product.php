<?php
include '../../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    header("Location: ../user/dashboard.php");
} else {
    header("Location: ../user/dashboard.php");
}
?>