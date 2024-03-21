<?php
require_once "Connexion.php";
if (isset($_GET['debut'])) {
    recuperationid();
} else {
    $liste_id = $_GET['liste_id'];
    recuperationdonnee($liste_id);
}

function recuperationid() {
    // Création de la connexion
    $conn = Connexion::getInstance();

    // Requête SQL
    $sql = "SELECT * FROM chatJS ORDER BY idMessage DESC LIMIT 10";
    // Exécution de la requête
    $result = $conn->query($sql);

    // Récupération des résultats
    $messages = $result->fetchAll(PDO::FETCH_ASSOC);
    $id_debut = 0;
    // Affichage des résultats
    foreach ($messages as $message) {
        $contenu = $message['contenu'];
        $pseudo = $message['userPseudo'];
        $date = $message['horaire'];
        $id = $message['idMessage'];
        $id_debut = $id;
    }
    echo $id_debut;
}

function recuperationdonnee(int $id) {
    // Création de la connexion
    $conn = Connexion::getInstance();

    // Requête SQL
    $sql = "SELECT * FROM chatJS WHERE idMessage >= $id ORDER BY horaire ASC";
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
}
?>