<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Compétences et Diplômes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="comp.css">
</head>
<body>




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
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Mes Compétences</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <!-- Liste des compétences de l'employé -->
                            <li class="list-group-item">Compétence 1 <button class="btn btn-danger btn-sm float-end">Supprimer</button></li>
                            <li class="list-group-item">Compétence 2 <button class="btn btn-danger btn-sm float-end">Supprimer</button></li>
                            <li class="list-group-item">Compétence 3 <button class="btn btn-danger btn-sm float-end">Supprimer</button></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#ajouterCompetenceModal">Enregistrer</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Mes Diplômes</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <!-- Liste des diplômes de l'employé -->
                            <li class="list-group-item">Diplôme 1 <button class="btn btn-danger btn-sm float-end">Supprimer</button></li>
                            <li class="list-group-item">Diplôme 2 <button class="btn btn-danger btn-sm float-end">Supprimer</button></li>
                            <li class="list-group-item">Diplôme 3 <button class="btn btn-danger btn-sm float-end">Supprimer</button></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#ajouterDiplomeModal">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour ajouter une compétence -->
    <div class="modal fade" id="ajouterCompetenceModal" tabindex="-1" aria-labelledby="ajouterCompetenceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterCompetenceModalLabel">Ajouter une Compétence</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="competence" class="form-label">Nom de la Compétence</label>
                            <input type="text" class="form-control" id="competence">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-orange">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour ajouter un diplôme -->
    <div class="modal fade" id="ajouterDiplomeModal" tabindex="-1" aria-labelledby="ajouterDiplomeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterDiplomeModalLabel">Ajouter un Diplôme</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="diplome" class="form-label">Nom du Diplôme</label>
                            <input type="text" class="form-control" id="diplome">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-orange">Ajouter</button>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
