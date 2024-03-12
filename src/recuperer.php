<?php
require_once "Connexion.php";
    // Création de la connexion
    $conn = Connexion::getInstance();

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

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

            // Formatage du message en HTML
            echo "<div class='message'>
                    <span class='message'$id>$message</span>
                    <span class='info_message'>$pseudo | $date</span>
                </div>";
        }
    } else {
        echo "Aucun message trouvé.";
    }

    // Fermeture de la connexion
    $conn->close();
?>