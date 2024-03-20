<?php
require_once "Connexion.php";
// Création de la connexion
$conn = Connexion::getInstance();
// Requête SQL
$sql = "SELECT * FROM chatJS";

// Exécution de la requête
$result = $conn->query($sql);

// Récupération des résultats
$messages = $result->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats
foreach ($messages as $message) {
    $contenu = $message['contenu'];
    $pseudo = $message['userPseudo'];
    $date = $message['horaire'];
    echo "<p><strong>$pseudo</strong> : $contenu <em>($date)</em></p><hr>";
}
?>