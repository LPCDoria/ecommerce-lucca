<?php
include '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'price' => $price]);

    header("Location: ../user/dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Adicionar Produto</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Nome do Produto</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Preço</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>
</body>
</html>