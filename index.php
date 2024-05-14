<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GMAE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=Work+Sans&display=swap" rel="stylesheet">
    <meta name="description" content="">
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/js/login.js" defer></script>
</head>
<body class="login_page-body">
    <header>
        <img src="assets/logo_GMAE.png" alt="logo de GMAE">
        <h1 class="header-title">Projet<span>GMAE</span></h1>
    </header>
    <main>
        <section class="login-form">
            <h2>Log In</h2>
         
            <form action="#" method="post" id="login-form">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password"></input>
                <input type="submit" value="Se connecter">
            </form>
            <div class="forgotten-password-link"><a href="#">Mots de passe oublié</a></div>
            <div id="errorMessage">
                <?php
                // Insérez ici votre code PHP pour gérer l'authentification
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Récupérer les données du formulaire
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Votre code de validation et d'authentification ici
                }
                ?>
            </div>
        </section>
    </main>
    <footer class="login_page-footer">
        <nav>
            <ul>
                <li><a href="#">Mentions Légales</a></li>
            </ul>
        </nav>
    </footer>
</body>
</html>
