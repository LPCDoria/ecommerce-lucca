<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="greeting">Bem-vindo, <?= htmlspecialchars($_SESSION['username']) ?></h2>
            <div class="user-area">
                <div class="user-info">
                    <?php if (false): // Replace with condition to check if user has a profile image ?>
                        <img src="https://via.placeholder.com/50" alt="User Icon">
                    <?php else: ?>
                        <div class="user-icon"><?= htmlspecialchars($_SESSION['username'][0]) ?></div>
                    <?php endif; ?>
                    <div class="user-details">
                        <p><strong><?= htmlspecialchars($_SESSION['username']) ?></strong></p>
                        <p><?= htmlspecialchars($_SESSION['email']) ?></p>
                    </div>
                </div>
                <a href="../../logout.php" class="btn btn-danger btn-logout">Sair</a>
            </div>
        </div>
    </div>