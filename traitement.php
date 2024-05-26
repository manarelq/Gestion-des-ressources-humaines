<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Compétences et Diplômes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="gerercompdip.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Compétences et Diplômes</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employé</th>
                    <th>Compétence</th>
                    <th>Diplôme</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(isset($_POST["nom-competence"]) && isset($_POST["nom-diplome"])) {
                        $competence = $_POST["nom-competence"];
                        $diplome = $_POST["nom-diplome"];
                        echo "<tr>";
                        echo "<td>John Doe</td>"; // Remplacez par le nom de l'employé approprié
                        echo "<td>$competence</td>";
                        echo "<td>$diplome</td>";
                        echo "<td>";
                        echo "<button class='btn btn-success'>Accepter</button>";
                        echo "<button class='btn btn-danger'>Refuser</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
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
