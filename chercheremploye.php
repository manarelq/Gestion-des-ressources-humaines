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

// Traitement de la recherche d'employé
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST['search_query'];

    // Requête SQL pour rechercher les employés correspondants
    $sql = "SELECT * FROM employes WHERE firstname LIKE '%$search_query%'";


    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chercher un Employé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="chercheremploye.css"> <!-- Inclure votre propre fichier CSS -->
</head>
<body>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Entrez le nom de l'employé" name="search_query">
                        <button class="btn btn-primary" type="submit">Chercher</button>
                    </div>
                </form>
            </div>
        </div>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $result->num_rows > 0) : ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <ul class="list-group">
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <li class="list-group-item">
                                <a href="details_employe.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['firstname'] . " " . $row['lastname']; ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
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

<?php
// Fermer la connexion à la base de données
$conn->close();
?>
