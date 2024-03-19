<?php
require_once "Connexion.php";
// Création de la connexion
$conn = Connexion::getInstance();

    $debut = $_GET['debut'];


    // Requête SQL
    $sql = "SELECT * FROM chatJS";


    // Requête pour récupérer les messages de la base de données
    $sql = "SELECT * FROM chatJS ORDER BY horaire DESC LIMIT 10";
    $result = $conn->query($sql);

    // Vérification s'il y a des résultats
    if ($result->num_rows > 0) {
        // Construction du HTML des messages
        while($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $message = htmlspecialchars($row["contenu"]);
            $pseudo = htmlspecialchars($row["userPseudo"]);
            $date = date("H:i:s", $row["horaire"]);


    // Affichage des résultats
    foreach ($messages as $message) {
        $contenu = $message['contenu'];
        $pseudo = $message['userPseudo'];
        $date = $message['horaire'];
        echo "<p><strong>$pseudo</strong> : $contenu <em>($date)</em></p>";
    }
}
}
?>