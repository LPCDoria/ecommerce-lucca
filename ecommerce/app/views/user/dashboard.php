<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['email'] !== 'admin@gmail.com') {
    header("Location: ../index.php");
    exit();
}
include_once '../../config/database.php';

$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
}

.greeting {
    margin:1.25rem 0 0 0;
    padding: 0.625rem 0 0.625rem 0;
    font-size: 1.5rem;
    font-size: 1.5rem;
}

.user-area {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.user-info {
    display: flex;
    align-items: center;
    background: #f8f9fa;
    padding: 10px;
    border-radius: 10px;
    margin-top: 20px;
    position: relative;
}

.user-info img,
.user-info .user-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1.5rem;
    margin-right: 15px;
    background-color: #007bff;
}

.user-info .user-details {
    flex-grow: 1;
}

.btn-logout {
    margin-top: 10px; /* Ensures some space above the button */
}

</style>

</head>
<body>
    <div class="container">
    <div class="header">
    <h2 class="greeting">Bem-vindo, Admin</h2>
    <div class="user-area">
        <div class="user-info">
            <?php if (false): // Replace with condition to check if user has a profile image ?>
                <img src="https://via.placeholder.com/50" alt="User Icon">
            <?php else: ?>
                <div class="user-icon"><svg fill="white" width="25px" height="25px" viewBox="0 0 24 24" id="user" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><path id="primary" d="M21,20a2,2,0,0,1-2,2H5a2,2,0,0,1-2-2,6,6,0,0,1,6-6h6A6,6,0,0,1,21,20Zm-9-8A5,5,0,1,0,7,7,5,5,0,0,0,12,12Z" style="fill: rgb(0, 0, 0);"></path></svg></div>
            <?php endif; ?>
            <div class="user-details">
                <p><strong>Admin</strong></p>
                <p><?= htmlspecialchars($_SESSION['email']) ?></p>
            </div>
            </div>
                <!-- Logout button moved to the bottom -->
                <a href="logout.php" class="btn btn-danger btn-logout">Sair</a>
            </div>
        </div>

        <h3>Produtos</h3>
        <a href="../product/add_product.php" class="btn btn-primary">Adicionar Produto</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['id']) ?></td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['price']) ?></td>
                    <td>
                        <a href="../product/edit_product.php?id=<?= htmlspecialchars($product['id']) ?>" class="btn btn-warning">Editar</a>
                        <a href="../product/delete_product.php ?id=<?= htmlspecialchars($product['id']) ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>