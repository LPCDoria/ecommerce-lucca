
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css">
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/models/Products.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/views/user/register.php">Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/views/user/login.php">Login</a>
                    </li>
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