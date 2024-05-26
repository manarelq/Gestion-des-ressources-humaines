<?php
// Vérifie si l'identifiant de la fiche de paie est fourni dans l'URL
if (isset($_GET['id'])) {
    // Récupère l'identifiant de la fiche de paie depuis l'URL
    $fiche_id = $_GET['id'];
    
    // Ici, vous devriez récupérer les données de la fiche de paie à partir de la base de données
    // Remplacez les lignes suivantes par votre logique de récupération de données depuis la base de données
    $nom = "John Doe";
    $mois = "Janvier";
    $annee = "2024";
    $montant = "$5000";
    $statut = "Payée";
} else {
    // Si l'identifiant de la fiche de paie n'est pas fourni, redirigez l'utilisateur vers une autre page ou affichez un message d'erreur
    header("Location: gererlesfiches.php");
    exit; // Assure que le script se termine après la redirection
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes dans la requête POST
    if (isset($_POST['nom']) && isset($_POST['mois']) && isset($_POST['annee']) && isset($_POST['montant']) && isset($_POST['statut']) && isset($_POST['fiche_id'])) {
        // Récupère les données envoyées depuis le formulaire
        $nom = $_POST['nom'];
        $mois = $_POST['mois'];
        $annee = $_POST['annee'];
        $montant = $_POST['montant'];
        $statut = $_POST['statut'];
        $fiche_id = $_POST['fiche_id'];

        // Maintenant, vous devez mettre à jour les données dans la base de données
        // Vous pouvez utiliser une requête SQL UPDATE pour cela
        
        // Exemple de requête UPDATE (veuillez adapter en fonction de votre structure de base de données)
        /*
        $sql = "UPDATE Payroll SET nom='$nom', mois='$mois', annee='$annee', montant='$montant', statut='$statut' WHERE id='$fiche_id'";
        
        // Exécute la requête
        if ($conn->query($sql) === TRUE) {
            echo "Les données ont été mises à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour des données: " . $conn->error;
        }
        */

        // Après avoir exécuté la requête de mise à jour, vous pouvez rediriger l'utilisateur vers une autre page
        // Par exemple, si vous voulez le rediriger vers la page de gestion des fiches de paie
        header("Location: gererlesfiches.php");
        exit;
    } else {
        echo "Toutes les données nécessaires n'ont pas été fournies.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Édition de la Fiche de Paie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="editer.css">
</head>
<body>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom; ?>">
            </div>
            <div class="mb-3">
                <label for="Mois" class="form-label">Mois</label>
                <input type="text" class="form-control" id="Mois" name="mois" value="<?php echo $mois; ?>">
            </div>
            <div class="mb-3">
                <label for="Année" class="form-label">Année</label>
                <input type="text" class="form-control" id="Année" name="annee" value="<?php echo $annee; ?>">
            </div>
            <div class="mb-3">
                <label for="Montant" class="form-label">Montant</label>
                <input type="text" class="form-control" id="Montant" name="montant" value="<?php echo $montant; ?>">
            </div>
            <div class="mb-3">
                <label for="Statut" class="form-label">Statut</label>
                <input type="text" class="form-control" id="Statut" name="statut" value="<?php echo $statut; ?>">
            </div>
            <!-- Champ caché pour envoyer l'identifiant de la fiche de paie lors de la soumission du formulaire -->
            <input type="hidden" name="fiche_id" value="<?php echo $fiche_id; ?>">
            <!-- Bouton pour sauvegarder les modifications -->
            <button type="submit" class="btn btn-orange">Enregistrer</button>
        </form>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
