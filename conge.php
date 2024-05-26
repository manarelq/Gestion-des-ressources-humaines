<?php
// Initialisation des variables
$dateDebutSaisie = $dateFinSaisie = $raisonSaisie = "";

// Connexion à la base de données (assurez-vous de modifier les informations de connexion)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sfe";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Vérifier si les clés existent dans $_POST avant de les utiliser
if(isset($_POST['dateDebut']) && isset($_POST['dateFin']) && isset($_POST['raison'])) {
    // Récupération des données du formulaire
    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    $raison = $_POST['raison'];

    // Préparation de la requête SQL d'insertion
    $sql = "INSERT INTO conges (date_debut, date_fin, raison) VALUES ('$dateDebut', '$dateFin', '$raison')";

   // Exécution de la requête d'insertion
    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            // Stocker les informations saisies
            $dateDebutSaisie = $dateDebut;
            $dateFinSaisie = $dateFin;
            $raisonSaisie = $raison;
        } else {
            echo "<p>Erreur : Aucune ligne n'a été insérée</p>";
        }
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de Congé</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="conge.css">
</head>
<body>
    <header class="container-fluid bg-orange text-light py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    Demande de Congé
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
                    <a class="nav-link" href="infoemploye.html">Profil</a>
                </li>
            </ul>
            <button class="btn btn-danger">Déconnexion</button>
        </div>
    </nav>
    
    <div class="container">
        <h2>Demande de Congé</h2>
        <div class="row">
            <div class="col-md-6">
                <form action="conge.php" method="POST">
                    <div class="form-group">
                        <label for="dateDebut">Date de Début</label>
                        <input type="date" class="form-control" id="dateDebut" name="dateDebut" required>
                    </div>
                    <div class="form-group">
                        <label for="dateFin">Date de Fin</label>
                        <input type="date" class="form-control" id="dateFin" name="dateFin" required>
                    </div>
                    <div class="form-group">
                        <label for="raison">Raison</label>
                        <textarea class="form-control" id="raison" name="raison" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Demander Congé</button>
                    <button type="button" class="btn btn-secondary" onclick="annulerDemande()">Annuler</button>
                </form>
                <!-- Afficher le message de succès ici -->
                <?php
                if (!empty($dateDebutSaisie) && !empty($dateFinSaisie) && !empty($raisonSaisie)) {
                    echo "<div id='success-message' class='alert alert-success'>Demande de congé enregistrée avec succès</div>";
                }
                ?>
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

    <script>
        function annulerDemande() {
            document.getElementById("dateDebut").value = "";
            document.getElementById("dateFin").value = "";
            document.getElementById("raison").value = "";
        }
    </script>
</body>
</html>
