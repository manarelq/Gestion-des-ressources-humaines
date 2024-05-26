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
        <div id="message-container"></div> <!-- Section pour afficher les messages -->
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
                // Connexion à la base de données
                $conn = new mysqli('localhost', 'root', '', 'sfe');

                // Vérifiez la connexion
                if ($conn->connect_error) {
                    die("Échec de la connexion : " . $conn->connect_error);
                }

                // Récupération des données pour l'affichage
                $sql = "SELECT employe, competence, diplome FROM competences";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["employe"] . "</td>";
                        echo "<td>" . $row["competence"] . "</td>";
                        echo "<td>" . $row["diplome"] . "</td>";
                        echo "<td>";
                        echo "<button class='btn btn-success accept-btn' data-competence='" . $row["competence"] . "' data-diplome='" . $row["diplome"] . "'>Accepter</button>";
                        echo "<button class='btn btn-danger refuse-btn' data-competence='" . $row["competence"] . "' data-diplome='" . $row["diplome"] . "'>Refuser</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucune compétence ou diplôme trouvé</td></tr>";
                }

                $conn->close();
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
    <script>
    // Fonction pour afficher le message
    function showMessage(message, type) {
        var messageContainer = document.getElementById('message-container');
        messageContainer.innerHTML = "<div class='alert alert-" + type + "'>" + message + "</div>";
    }

    // Sélection des boutons "Accepter" et "Refuser"
    var acceptButtons = document.querySelectorAll('.accept-btn');
    var refuseButtons = document.querySelectorAll('.refuse-btn');

    // Ajout des gestionnaires d'événements aux boutons
    acceptButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var competence = button.getAttribute('data-competence');
            var diplome = button.getAttribute('data-diplome');
            showMessage("Compétence '" + competence + "' et diplôme '" + diplome + "' acceptés", "success");
        });
    });

    refuseButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var competence = button.getAttribute('data-competence');
            var diplome = button.getAttribute('data-diplome');
            showMessage("Compétence '" + competence + "' et diplôme '" + diplome + "' refusés", "danger");
        });
    });
    </script>
</body>
</html>
