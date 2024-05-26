<?php
// Inclure le fichier de connexion à la base de données
include 'config.php';

// Initialiser la variable du message
$message = "";

// Vérifier si une action a été soumise
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'action est pour accepter un congé
    if (isset($_POST['accepter'])) {
        // Traiter l'action d'acceptation du congé
        // Assurez-vous de mettre à jour la base de données ou d'effectuer toute autre logique nécessaire ici
        $message = "La demande de congé a été acceptée avec succès.";
    }
    // Vérifier si l'action est pour refuser un congé
    elseif (isset($_POST['refuser'])) {
        // Traiter l'action de refus du congé
        // Assurez-vous de mettre à jour la base de données ou d'effectuer toute autre logique nécessaire ici
        $message = "La demande de congé a été refusée.";
    }
}

// Récupération des données de la table conges
$sql = "SELECT * FROM conges";
$result = $conn->query($sql);

// Fermeture de la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Congés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Inclure votre propre fichier CSS si nécessaire -->
    <link rel="stylesheet" href="gererconge.css">
</head>
<body>
    <header class="container-fluid bg-dark text-light py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    Gestion des Congés
                </div>
                <div class="col-auto">
                    <img src="logovala.png" alt="Logo de l'entreprise" style="max-height: 50px;">
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Liens vers d'autres sections du site -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="inforespo.html">Profil</a>
                </li>
            </ul>
            <button class="btn btn-danger">Déconnexion</button>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if ($result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="card">
                            <div class="card-header bg-orange text-white">Demande de Congé</div>
                            <div class="card-body">
                                <p class="card-text">Date de début : <?php echo $row["date_debut"]; ?></p>
                                <p class="card-text">Date de fin : <?php echo $row["date_fin"]; ?></p>
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <button type="submit" name="accepter" class="btn btn-success">Accepter</button>
                                    <button type="submit" name="refuser" class="btn btn-danger">Refuser</button>
                                </form>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Aucune demande de congé trouvée</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Afficher le message ici -->
        <?php if (!empty($message)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>

    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p>Informations de contact de l'entreprise</p>
            <p>
                <a href="#">Politique de confidentialité</a> |
                <a href="#">Conditions d'utilisation</a>
            </p>
        </div>
    </footer>

    <!-- Optionnel: Inclure les scripts Bootstrap pour les fonctionnalités supplémentaires -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
