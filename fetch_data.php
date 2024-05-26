<?php
// Inclure le fichier de configuration pour la connexion à la base de données
include 'config.php';

// Requête SQL pour récupérer les données des responsables
$sql_responsables = "SELECT nom, email, role FROM responsables";
$result_responsables = $conn->query($sql_responsables);
$responsables = [];

if ($result_responsables->num_rows > 0) {
    // Boucle à travers les résultats et les stocker dans un tableau
    while ($row = $result_responsables->fetch_assoc()) {
        $responsables[] = $row;
    }
}

// Requête SQL pour récupérer les données des employés
$sql_employe = "SELECT nom, email, role FROM employe";
$result_employe = $conn->query($sql_employe);
$employe = [];

if ($result_employe->num_rows > 0) {
    // Boucle à travers les résultats et les stocker dans un tableau
    while ($row = $result_employe->fetch_assoc()) {
        $employe[] = $row;
    }
}

// Fermez la connexion à la base de données
$conn->close();

// Afficher les données récupérées au format JSON
$data_json = json_encode(['responsables' => $responsables, 'employe' => $employe]);
?>
