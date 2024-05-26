<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = ""; // Mettez votre mot de passe MySQL ici si vous en avez un
$dbname = "sfe";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Identifiant de l'employé (vous devrez le récupérer à partir de votre système d'authentification)
$employee_id = 1; // Par exemple, l'identifiant de l'employé est défini ici comme 1

// Requête SQL pour récupérer les données de la fiche de paie de l'employé
$sql = "SELECT * FROM Payroll WHERE id = $employee_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the first row (assuming there's only one payroll record per employee)
    $row = $result->fetch_assoc();
    // Stockage des montants dans des variables PHP
    $salaire_de_base = $row["amount"];
    // Ajoutez d'autres variables pour les autres composantes de la fiche de paie si nécessaire
} else {
    echo "Aucun enregistrement trouvé pour cet employé.";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accéder à la fiche de paie</title>
    <link rel="stylesheet" href="fichedepaie.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
    <!-- En-tête -->
    <header class="container-fluid bg-dark text-light py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    Accéder à la fiche de paie
                </div>
                <div class="col-auto">
                    <img src="logovala.png" alt="Logo de l'entreprise" style="max-height: 50px;">
                </div>
            </div>
        </div>
    </header>

    <!-- Menu de navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Liens vers d'autres sections du site -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="infoemploye.php">Profil</a>
                </li>
            </ul>
            <button class="btn btn-danger">Déconnexion</button>
        </div>
    </nav>

    <!-- Section de visualisation de la fiche de paie -->
    <section class="container my-5">
        <h2 class="mb-4">Votre fiche de paie</h2>
        <!-- Tableau des composantes de la fiche de paie -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Composante</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                <!-- Lignes de données pour les différentes composantes -->
                <tr>
                    <td>Salaire de base</td>
                    <!-- Utilisation des variables PHP pour afficher les montants -->
                    <td>$<?php echo isset($salaire_de_base) ? $salaire_de_base : "N/A"; ?></td>
                </tr>
                <!-- Ajoutez d'autres lignes de données pour les autres composantes -->
            </tbody>
        </table>
        <!-- Total des revenus et des retenues -->

        <!-- Date de la fiche de paie -->
        <p class="mt-4">Date de la fiche de paie : <?php echo isset($row['month']) ? $row['month'] : "N/A"; ?>/<?php echo isset($row['year']) ? $row['year'] : "N/A"; ?></p>
        <!-- Actions -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button id="downloadPdf" class="btn btn-orange me-md-2" type="button">Télécharger la fiche de paie (PDF)</button>
            <button class="btn btn-secondary" type="button">Imprimer la fiche de paie</button>
        </div>
    </section>

    <!-- Pied de page -->
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
        document.getElementById('downloadPdf').addEventListener('click', function() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.text(20, 20, 'Fiche de paie');
            doc.text(20, 30, 'Salaire de base: <?php echo addslashes($salaire_de_base); ?>');
            // Ajoutez d'autres composantes de la fiche de paie si nécessaire

            doc.save('fiche_de_paie.pdf');
        });
    </script>
</body>
</html>
