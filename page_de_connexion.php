
<h1>Bonjour, <?php echo isset($_POST['username']) ? $_POST['username'] : 'Utilisateur inconnu'; ?></h1>

<?php
session_start();

// Vos informations de connexion à la base de données
$host = '127.0.0.1';
$username_db = 'root';
$password_db = '';
$dbname = 'gmae';

// Connexion à la base de données
$conn = new mysqli($host, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$username_input = $_POST['username'];
$password_input = $_POST['password'];

// Requête pour rechercher l'utilisateur dans la base de données
$sql = "SELECT * FROM users WHERE nom_utilisateur = '$username_input' AND mot_de_passe = '$password_input'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Authentification réussie
    $_SESSION['username'] = $username_input;
    
    // Redirection vers la page d'affichage des utilisateurs
    header('Location: afficher_utilisateurs.php');
    exit;
} else {
    // Authentification échouée, rediriger vers la page de connexion avec un message d'erreur
    header('Location: page_de_connexion.php?erreur=1');
    exit;
}

// Fermer la connexion à la base de données
$conn->close();
?>