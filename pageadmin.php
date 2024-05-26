<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil de l'Admin</title>
    <link rel="stylesheet" href="pageadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="col-auto">
            <img src="logovala.png" alt="Logo de l'entreprise" style="max-height: 50px;">
        </div>
        <div class="container">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <span class="additional-text">Bienvenue, Admin</span> <!-- Texte supplémentaire -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto"> <!-- Utilisation de ml-auto pour aligner les éléments à droite -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gestion des comptes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    // Inclure le fichier fetch_data.php pour récupérer les données
    include 'fetch_data.php';

    // Décodez les données JSON récupérées
    $data = json_decode($data_json, true);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Gestion des Comptes Responsables
                    </div>
                    <div class="card-body">
                            <a href="addrespo.php" class="btn btn-orange">Ajouter Responsable</a>
                            <a href="modifierrespo.php" class="btn btn-orange">Modifier Responsable</a>
                            <a href="supprespo.php" class="btn btn-orange">Supprimer Responsable</a>
                        </div>
                    <div class="card-body">
                        <!-- Afficher les emails, noms et rôles des responsables -->
                        <ul class="list-group">
                            <?php foreach ($data['responsables'] as $responsables): ?>
                                <li class="list-group-item">Nom: <?php echo $responsables['nom']; ?> | Email: <?php echo $responsables['email']; ?> | Rôle: <?php echo $responsables['role']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Gestion des Comptes Employés
                    </div>
                    <div class="card-body">
                            <a href="addemploye.php" class="btn btn-orange">Ajouter Employé</a>
                            <a href="modifieremploye.php" class="btn btn-orange">Modifier Employé</a>
                            <a href="suppemploye.php" class="btn btn-orange">Supprimer Employé</a>
                        </div>
                    <div class="card-body">
                        <!-- Afficher les emails, noms et rôles des employés -->
                        <ul class="list-group">
                            <?php foreach ($data['employe'] as $employe): ?>
                                <li class="list-group-item">Nom: <?php echo $employe['nom']; ?> | Email: <?php echo $employe['email']; ?> | Rôle: <?php echo $employe['role']; ?></li>
                            <?php endforeach; ?>
                        </ul>
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
