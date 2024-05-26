<?php
header('Content-Type: application/json');

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'sfe');

// Vérifiez la connexion
if ($conn->connect_error) {
    die(json_encode(['message' => 'Échec de la connexion à la base de données']));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nom-competence"]) && isset($_POST["nom-diplome"])) {
        $competence = $conn->real_escape_string($_POST["nom-competence"]);
        $diplome = $conn->real_escape_string($_POST["nom-diplome"]);

        // Insertion dans la base de données
        $sql = "INSERT INTO competences (employe, competence, diplome) VALUES ('John Doe', '$competence', '$diplome')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['message' => "Compétence et diplôme ajoutés avec succès"]);
        } else {
            echo json_encode(['message' => "Erreur : " . $conn->error]);
        }
    } else {
        echo json_encode(['message' => 'Données du formulaire manquantes']);
    }
}

$conn->close();
?>
