<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>   
   
   <?php
    session_start();
    var_dump($_SESSION);

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }

    $host = '127.0.0.1';
    $username_db = 'root';
    $password_db = '';
    $dbname = 'gmae';

    $conn = new mysqli($host, $username_db, $password_db, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];
    ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Bonjour, <?php echo $username; ?></h1>

        <h2>Liste des utilisateurs :</h2>
        <table>
            <tr>
                <th>Nom d'utilisateur</th>
                <th>Mot de passe</th>
                <th>Question secrète</th>
            </tr>
            <?php
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nom_utilisateur"] . "</td>";
                    echo "<td>" . $row["mot_de_passe"] . "</td>";
                    echo "<td>" . $row["question_secrete"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Aucun utilisateur trouvé.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </body>
    </html>