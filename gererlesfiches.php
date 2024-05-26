<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Fiches de Paie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="gererlesfiches.css">
</head>
<body>
    <div class="container">
        <h1>Gestion des Fiches de Paie</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employé</th>
                    <th>Mois</th>
                    <th>Année</th>
                    <th>Montant</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Janvier</td>
                    <td>2024</td>
                    <td>2500€</td>
                    <td>Payée</td>
                    <td>
                        <!-- Lien d'édition avec l'identifiant de la fiche de paie -->
                        <a href="editer.php?id=1" class="btn btn-primary">Éditer</a>
                        <button class="btn btn-danger">Supprimer</button>
                    </td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>Février</td>
                    <td>2024</td>
                    <td>2800€</td>
                    <td>En attente</td>
                    <td>
                        <!-- Lien d'édition avec l'identifiant de la fiche de paie -->
                        <a href="editer.php?id=2" class="btn btn-primary">Éditer</a>
                        <button class="btn btn-danger">Supprimer</button>
                    </td>
                </tr>
                <!-- Ajoutez d'autres lignes pour chaque fiche de paie de l'employé -->
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
