<?php
include '../../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $price = $_POST['price'];

        $sql = "UPDATE products SET name = :name, price = :price WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'price' => $price, 'id' => $id]);

        header("Location: ../user/dashboard.php");
    }
} else {
    header("Location: ../user/dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Editar Produto</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Nome do Produto</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Preço</label>
                <input type="text" class="form-control" id="price" name="price" value="<?= $product['price'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>