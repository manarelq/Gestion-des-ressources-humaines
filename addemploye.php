<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un employé</title>
    <link rel="stylesheet" href="addrespo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-orange text-orange">
                        Ajouter un employé
                    </div>
                    <div class="card-body">
                        <form action="ajouter_employe.php" method="post">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom">
                            </div>
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez l'email">
                            </div>
                            <div class="form-group">
                                <label for="role">Rôle :</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="ventes">Ventes</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="service-client">Service client</option>
                                    <option value="technicien">Technicien</option>
                                    <option value="rh">Ressources humaines</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-orange">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
