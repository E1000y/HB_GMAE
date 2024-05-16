<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = '127.0.0.1';
    $username_db = 'root';
    $password_db = '';
    $dbname = 'gmae';

    $conn = new mysqli($host, $username_db, $password_db, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE nom_utilisateur = ? AND mot_de_passe = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
        echo "<p style='color:red;'>$error_message</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="login-form">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
                <input type="submit" value="Se connecter">
            </form>
            <div class="forgotten-password-link"><a href="#">Mots de passe oublié</a></div>
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