<?php
// Includez le fichier de configuration pour la connexion à la base de données
include 'config.php';

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Préparer et exécuter la requête SQL pour insérer les données dans la table responsables
    $sql = "INSERT INTO responsables (nom, email, role) VALUES ('$nom', '$email', '$role')";
    if ($conn->query($sql) === TRUE) {
        // Redirection vers la pageadmin.php après l'ajout réussi
        header("Location: pageadmin.php");
        exit(); // Assure que le script ne continue pas après la redirection
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermez la connexion à la base de données
    $conn->close();
}
?>
