<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include_once '../app/config/database.php';

// Extrair o primeiro nome do usuário
$fullName = $_SESSION['username'];
$firstName = explode(' ', $fullName)[0];

// Consultar produtos
$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css">
    <style>
        



.user-area {
    display: flex;
    flex-direction: row;
    align-items: center;
}

.user-info {
    display: flex;
    align-items: center;
    background: #f8f9fa;
    padding: 10px;
    
    text-align: center;
    position: relative;
}

.user-info img,
.user-info .user-icon {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 0.75rem;
    margin-right: 7.5px;
    background-color: #007bff;
    
}

.user-info .user-details {
    
    
    flex-grow: 1;
    
}
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">E-commerce</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/models/Products.php">Produtos</a>
                    </li>
                    <div class="header">
                        <div class="user-area">
                            <div class="user-info">
                                <div class="user-icon"><?= htmlspecialchars($firstName[0]) ?></div>
                                <strong><?= htmlspecialchars($firstName) ?></strong>
                            </div>
                            <!-- Logout button moved to the bottom -->
                            <a href="../app/views/user/logout.php" class="btn-sm btn-danger btn-logout">Sair</a>
                        </div>
                    </div>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <h1>Bem-vindo ao E-commerce</h1>
        <p>Navegue pelos nossos produtos e descubra as melhores ofertas!</p>
        <div class="btn-group" role="group">
            <a href="../app/models/Products.php" class="btn btn-primary">Ver Produtos</a>
        </div>
    </div>
    <?php
        // Incluindo o footer
        include_once '../app/views/layout/footer.php';
        ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
</body>
</html>