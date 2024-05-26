<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employe_id = isset($_POST['employe']) ? $_POST['employe'] : '';

    if (!empty($employe_id)) {
        // Prépare et exécute la requête SQL pour supprimer l'employé
        $sql = "DELETE FROM employe WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $employe_id);

        if ($stmt->execute()) {
            // Redirige vers la page d'administration après la suppression réussie
            header("Location: pageadmin.php");
            exit();
        } else {
            echo "Erreur lors de la suppression : " . $conn->error;
        }

        // Ferme la connexion et la déclaration préparée
        $stmt->close();
        $conn->close();
    } else {
        echo "Aucun employé sélectionné.";
    }
} else {
    // Redirige vers la page d'administration si la méthode n'est pas POST
    header("Location: pageadmin.php");
    exit();
}
?>
