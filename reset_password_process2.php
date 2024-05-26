<?php
include 'config.php'; // Inclure le fichier de configuration pour la connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $response = $_POST['response'];

    // Protéger contre les injections SQL
    $email = mysqli_real_escape_string($conn, $email);
    $response = mysqli_real_escape_string($conn, $response);

    // Requête SQL pour insérer les données dans la table
    $sql = "INSERT INTO password_reset2 (email, response) VALUES ('$email', '$response')";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page admin après l'enregistrement réussi
        header("Location: pageemploye.php");
        exit(); // Assurez-vous qu'aucune sortie supplémentaire ne soit envoyée après la redirection
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}
?>
