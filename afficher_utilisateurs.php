<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: page_de_connexion.php');
    exit;
}

// Afficher un message de bienvenue avec le nom d'utilisateur
echo "Bonjour " . $_SESSION['username'] . "<br>";

// Afficher les informations de l'utilisateur connecté (remplacez cela par la récupération des informations de votre base de données)
echo "Votre email: utilisateur@example.com<br><br>";

$host = '127.0.0.1';
$username_db = 'root'; // Renommé pour éviter la confusion avec le nom d'utilisateur saisi
$password_db = '';
$dbname = 'gmae';



// Afficher la liste des utilisateurs depuis la base de données
// Connexion à la base de données (remplacez les informations de connexion par les vôtres)
$conn = new mysqli($host, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les utilisateurs depuis la base de données
$sql = "SELECT * FROM utilisateurs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les utilisateurs sous forme de tableau
    echo "<h2>Liste des utilisateurs</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom d'utilisateur</th><th>Email</th><th>Question secrète</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["nom_utilisateur"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["question_secrete"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun utilisateur trouvé.";
}
$conn->close();
?>
