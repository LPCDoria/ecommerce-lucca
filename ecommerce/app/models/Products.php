<?php
include_once '../config/database.php';
include_once '../controllers/ProductController.php';

$productController = new ProductController($pdo);
$products = $productController->listProducts();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - E-commerce</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <!-- Header -->
    <header class="header bg-primary text-white py-3">
        <div class="container">
            <h1 class="text-center">E-commerce</h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/../ecommerce/public/index.php">Início</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../views/user/register.php">Cadastro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../views/user/login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="container my-5">
        <h2 class="mb-4">Nossos Produtos</h2>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                            <p class="card-text">Preço: R$ <?= htmlspecialchars($product['price']) ?></p>
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p>&copy; 2024 E-commerce. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>