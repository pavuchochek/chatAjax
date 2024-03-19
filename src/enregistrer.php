<?php


    $pseudo = $_POST['pseudo'];
    $contenu = $_POST['message'];
    enregistrer($pseudo, $contenu);

    function enregistrer($pseudo, $contenu) {
        require_once "Connexion.php";
        // Création de la connexion
        $conn = Connexion::getInstance();
        // Requête SQL
        $sql = "INSERT INTO chatJS (userPseudo, contenu) VALUES ('$pseudo', '$contenu')";
        // Exécution de la requête
        $conn->exec($sql);
    }
?>