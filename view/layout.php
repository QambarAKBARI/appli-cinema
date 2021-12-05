<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <title>Cinema</title>
</head>
<body>
    <header>
        <nav>
            <span>
                <img src="https://via.placeholder.com/80.png?text=LOGO" alt="logo">
            </span>
            <a href="?ctrl=store">Accueil</a>
        </nav>

    </header>

    <main>
        <?= $content ?>
    </main>
    
    <footer>
        &copy; 2021 - Store - All Rights Reserved
    </footer>
</body>
</html>