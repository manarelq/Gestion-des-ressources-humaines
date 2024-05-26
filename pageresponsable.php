<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Responsable</title>
    <link rel="stylesheet" href="pageemploye.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="col-auto">
            <img src="logovala.png" alt="Logo de l'entreprise" style="max-height: 50px;">
        </div>
        <div class="container">

            <a class="navbar-brand" href="#">Responsable Panel</a>
            <span class="additional-text">Bienvenue, responsable</span> <!-- Texte supplémentaire -->
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
                    <a class="nav-link" href="inforespo.php">Profil</a>
                </li>
            </ul>
        </div>
    </nav>




        
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="action-card">
                    <img src="informations.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Gestion comptes employés</h5>
                        <p class="card-text">gérer comptes employés.</p>
                    </div>
                    <div class="card-actions">
                        <a href="gereremp.php" class="btn btn-orange">Gérer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="action-card">
                    <img src="diplomes.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Mettre à jour ses informations</h5>
                        <p class="card-text">modifier les informations personnelles.</p>
                    </div>
                    <div class="card-actions">
                        <a href="inforespo.php" class="btn btn-orange">Modifier</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="action-card">
                    <img src="diplomes.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Gérer compétences et diplomes</h5>
                        <p class="card-text">gérer de nouvelles compétences et diplomes.</p>
                    </div>
                    <div class="card-actions">
                        <a href="gerercompdip.php" class="btn btn-orange">Gérer</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="action-card">
                    <img src="paie.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Gérer les fiches de paie</h5>
                        <p class="card-text">gérer la fiche de paie.</p>
                    </div>
                    <div class="card-actions">
                        <a href="gererlesfiches.php" class="btn btn-orange">Gérer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="action-card">
                    <img src="licence.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Gérer les licenciements</h5>
                        <p class="card-text">gérer licenciements.</p>
                    </div>
                    <div class="card-actions">
                        <a href="gererlicenciement.php" class="btn btn-orange">Gérer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="action-card">
                    <img src="congé.png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Gérer les Congés</h5>
                        <p class="card-text">gérer les Congés.</p>
                    </div>
                    <div class="card-actions">
                        <a href="gererconge.php" class="btn btn-orange">Gérer</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="action-card">
                    <img src="chercher (1).png" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Chercher un employé</h5>
                        <p class="card-text">chercher un employé.</p>
                    </div>
                    <div class="card-actions">
                        <a href="chercheremploye.php" class="btn btn-orange">Chercher</a>
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
