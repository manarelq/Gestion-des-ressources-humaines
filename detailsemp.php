<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'employé</title>
    <!-- Inclure les styles CSS et autres ressources nécessaires -->
</head>
<body>
    <h1>Détails de l'employé</h1>

    <?php
    // Récupérer l'identifiant de l'employé depuis l'URL
    $id_employe = $_GET['id'];

    // Charger les détails de l'employé à partir de la base de données
    // Remplacer cet exemple par votre propre logique pour charger les détails de l'employé

    // Afficher les détails de l'employé
    echo "<p>Nom de l'employé : John Doe</p>";
    echo "<p>Email de l'employé : john.doe@example.com</p>";
    // Afficher d'autres détails de l'employé

    ?>

    <!-- Ajouter d'autres éléments HTML pour afficher les détails de l'employé -->

</body>
</html>
