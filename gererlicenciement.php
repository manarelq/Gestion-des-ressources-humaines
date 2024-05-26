<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sfe";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Traitement du formulaire d'ajout de licenciement
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_employe = $_POST['nom_employe'];
    $motif_licenciement = $_POST['motif_licenciement'];

    // Insertion des données dans la base de données
    $sql = "INSERT INTO Licenciements (nom_employe, motif_licenciement, date_licenciement) VALUES ('$nom_employe', '$motif_licenciement', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Licenciement ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du licenciement: " . $conn->error;
    }
}

// Récupération des données de licenciements depuis la base de données
$sql = "SELECT * FROM Licenciements";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Licenciements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="gererlicenciement.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="col-auto">
            <img src="logovala.png" alt="Logo de l'entreprise" style="max-height: 50px;">
        </div>
        <div class="container">
            <a class="navbar-brand" href="#">Gestion des Licenciements</a>
            <!-- Bouton pour la version mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Liens de navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ajouter un licenciement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Statistiques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Liens vers d'autres sections du site -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link profile-link" href="inforespo.php">Profil</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-4">
        <!-- Formulaire pour ajouter un licenciement -->
        <div class="card">
            <div class="card-header">
                Ajouter un licenciement
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="employeeName" class="form-label">Nom de l'employé</label>
                        <input type="text" class="form-control" id="employeeName" name="nom_employe" required>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Motif du licenciement</label>
                        <textarea class="form-control" id="reason" rows="3" name="motif_licenciement" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Ajouter</button>
                </form>
            </div>
        </div>

        <!-- Tableau des licenciements -->
        <div class="mt-4">
            <h2>Liste des Licenciements</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Employé</th>
                        <th scope="col">Motif</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Remplir avec des données dynamiques -->
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nom_employe"] . "</td>";
                            echo "<td>" . $row["motif_licenciement"] . "</td>";
                            echo "<td>" . $row["date_licenciement"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>Aucun licenciement trouvé.</td></tr>";
                    }
                    ?>
                    <!-- Ajouter d'autres lignes de données si nécessaire -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p>Informations de contact de l'entreprise</p>
            <p>
                <a href="#">Politique de confidentialité</a> |
                <a href="#">Conditions d'utilisation</a>
            </p>
        </div>
    </footer>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Fermer la connexion à la base de données
$conn->close();
?>
