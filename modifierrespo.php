<?php
// Initialiser les variables avec des valeurs par défaut
$nom = '';
$email = '';
$role = '';

// Vérifie si l'identifiant du responsable est spécifié dans l'URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupère les informations du responsable depuis la base de données
    $sql = "SELECT * FROM responsables WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nom = $row['nom'];
        $email = $row['email'];
        $role = $row['role'];
    } else {
        header("Location: pageadmin.php?error=responsable_not_found");
        exit();
    }
}

// Vérifie si le formulaire est soumis via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';

    // Valide les données saisies par l'utilisateur
    if (empty($nom) || empty($email) || empty($role)) {
        header("Location: pageadmin.php?error=missing_data");
        exit();
    }

    // Vérifie si l'identifiant du responsable existe
    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        // Prépare la requête SQL pour mettre à jour les données du responsable dans la table responsables
        $sql = "UPDATE responsables SET nom=?, email=?, role=? WHERE id=?";

        // Prépare la requête
        $stmt = $conn->prepare($sql);

        // Lie les paramètres
        $stmt->bind_param("sssi", $nom, $email, $role, $id);

        // Exécute la requête préparée
        if ($stmt->execute()) {
            // Redirige vers la page d'administration après la mise à jour réussie
            header("Location: pageadmin.php?success=responsable_updated");
            exit();
        } else {
            // Affiche un message d'erreur si la mise à jour échoue
            echo "Erreur lors de la mise à jour des informations du responsable.";
        }

    } else {
        header("Location: pageadmin.php?error=invalid_id");
        exit();
    }

    // Ferme la connexion à la base de données
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un responsable</title>
    <link rel="stylesheet" href="addrespo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-orange text-orange">
                        Modifier un responsable
                    </div>
                    <div class="card-body">
                        <form action="modifier_responsable_process.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="role">Rôle :</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="superviseur" <?php if($role == 'superviseur') echo 'selected'; ?>>Superviseur</option>
                                    <option value="chef de projet" <?php if($role == 'chef de projet') echo 'selected'; ?>>Chef de projet</option>
                                    <option value="consultant" <?php if($role == 'consultant') echo 'selected'; ?>>Consultant</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-orange">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>