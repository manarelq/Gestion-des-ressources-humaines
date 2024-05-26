<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Employé</title>
    <link rel="stylesheet" href="pageemploye.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="col-auto">
            <img src="logovala.png" alt="Logo de l'entreprise" style="max-height: 50px;">
        </div>
        <div class="container">

            <a class="navbar-brand" href="#">Employé Panel</a>
            <span class="additional-text">Bienvenue, employé</span> <!-- Texte supplémentaire -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto"> <!-- Utilisation de ml-auto pour aligner les éléments à droite -->
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
                    <a class="nav-link" href="infoemploye.php">Profil</a>
                </li>
            </ul>
        </div>
    </nav>




        
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="action-card">
                    <img src="informations.png" alt="Mettre à jour ses informations" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Mettre à jour ses informations</h5>
                        <p class="card-text">Modifier les informations personnelles.</p>
                    </div>
                    <div class="card-actions">
                        <a href="infoemploye.php" class="btn btn-orange">Modifier</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="action-card">
                    <img src="diplomes.png" alt="Ajouter compétences" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Ajouter compétences et diplomes</h5>
                        <p class="card-text">Ajouter de nouvelles compétences et diplomes.</p>
                    </div>
                    <div class="card-actions">
                        <a href="ajoutetcomp.php" class="btn btn-orange">Ajouter</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="action-card">
                    <img src="cv.png" alt="Générer CV" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Générer CV</h5>
                        <p class="card-text">Générer un CV à partir des informations.</p>
                    </div>
                    <div class="card-actions">
                        <a href="generercv.php" class="btn btn-orange">Générer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="action-card">
                    <img src="congé.png" alt="Demander congé" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Demander congé</h5>
                        <p class="card-text">Demander un congé.</p>
                    </div>
                    <div class="card-actions">
                        <a href="conge.php" class="btn btn-orange">Demander</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="action-card">
                    <img src="paie.png" alt="Accéder à sa fiche de paie" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Accéder à sa fiche de paie</h5>
                        <p class="card-text">Consulter la fiche de paie.</p>
                    </div>
                    <div class="card-actions">
                        <a href="fichedepaie.php" class="btn btn-orange">Consulter</a>
                    </div>
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
</body>
</html>
