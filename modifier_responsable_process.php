<?php
include 'config.php';

// Vérifie si le formulaire est soumis via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = isset($_POST['nom']) ? $_POST['nom'] : ''; 
    $email = isset($_POST['email']) ? $_POST['email'] : ''; 
    $role = isset($_POST['role']) ? $_POST['role'] : ''; 

    // Vérifie si l'identifiant du responsable est défini dans le formulaire
    if(isset($_POST['id'])) {
        // Si l'identifiant est défini, il s'agit d'une modification des données existantes
        $id = $_POST['id'];

        // Prépare la requête SQL pour mettre à jour les données du responsable dans la table responsables
        $sql = "UPDATE responsables SET nom=?, email=?, role=? WHERE id=?";

        // Prépare la requête
        $stmt = $conn->prepare($sql);

        // Lie les paramètres
        $stmt->bind_param("sssi", $nom, $email, $role, $id);

    } else {
        // Si l'identifiant n'est pas défini, il s'agit d'une insertion de nouvelles données
        // Prépare la requête SQL pour insérer un nouveau responsable dans la table responsables
        $sql = "INSERT INTO responsables (nom, email, role) VALUES (?, ?, ?)";

        // Prépare la requête
        $stmt = $conn->prepare($sql);

        // Lie les paramètres
        $stmt->bind_param("sss", $nom, $email, $role);
    }

    // Exécute la requête préparée
    if ($stmt->execute()) {
        // Redirige vers la page d'administration après l'insertion ou la mise à jour réussie
        header("Location: pageadmin.php");
        exit(); // Assure que le script ne continue pas après la redirection
    } else {
        echo "Erreur : " . $conn->error;
    }

    // Ferme la connexion à la base de données
    $conn->close();
} else {
    // Si le formulaire n'est pas soumis via POST, redirigez vers une autre page
    header("Location: autre_page.php");
    exit();
}

?>
