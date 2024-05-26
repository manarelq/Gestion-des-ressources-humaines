<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $responsable_id = isset($_POST['Responsable']) ? $_POST['Responsable'] : '';

    if (!empty($responsable_id)) {
        // Prépare et exécute la requête SQL pour supprimer le responsable
        $sql = "DELETE FROM responsables WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $responsable_id);

        if ($stmt->execute()) {
            // Redirige vers la page d'administration après la suppression réussie
            header("Location: pageadmin.php");
            exit();
        } else {
            echo "Erreur lors de la suppression : " . $conn->error;
        }

        // Ferme la déclaration préparée
        $stmt->close();
    } else {
        echo "Aucun responsable sélectionné.";
    }

    // Ferme la connexion à la base de données
    $conn->close();
} else {
    // Redirige vers la page d'administration si la méthode n'est pas POST
    header("Location: pageadmin.php");
    exit();
}
?>
