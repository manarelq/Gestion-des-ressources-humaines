<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sfe";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Traitement du formulaire d'ajout d'employé
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'add') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $sql = "INSERT INTO employe (nom, email, password, role) VALUES ('$nom', '$email', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvel employé ajouté avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Comptes Employés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="gereremp.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="col-auto">
            <img src="logovala.png" alt="Logo de l'entreprise" style="max-height: 50px;">
        </div>
        <div class="container">
            <a class="navbar-brand" href="#">Gestion des Comptes Employés</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav"></div>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link profile-link" href="inforespo.html">Profil</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Ajouter un Employé</h2>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required placeholder="Entrez le nom">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Entrez l'email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Entrez le mot de passe">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Rôle</label>
                        <select class="form-control" id="role" name="role">
                            <option value="ventes">Ventes</option>
                            <option value="marketing">Marketing</option>
                            <option value="service-client">Service client</option>
                            <option value="technicien">Technicien</option>
                            <option value="rh">Ressources humaines</option>
                        </select>
                    </div>
                    <input type="hidden" name="action" value="add">
                    <button type="submit" class="btn btn-orange">Ajouter</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Liste des Employés</h2>
                <ul class="list-group">
                    <?php
                    $sql = "SELECT id, nom, role FROM employe";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                            echo htmlspecialchars($row["nom"]) . ' - ' . htmlspecialchars($row["role"]);
                            echo '<a href="modifieremploye.php?id='.htmlspecialchars($row["id"]).'" class="badge bg-primary rounded-pill">Modifier</a>';
                            echo '<a href="sup.php?id='.htmlspecialchars($row["id"]).'" class="badge bg-danger rounded-pill">Supprimer</a>';
                            echo '</li>';
                        }
                    } else {
                        echo '<li class="list-group-item">Aucun employé trouvé</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
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
</body>
</html>

<?php
$conn->close();
?>
