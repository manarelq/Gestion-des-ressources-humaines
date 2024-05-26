<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générer CV</title>
    <link rel="stylesheet" href="generercv.css"> <!-- Ajoutez votre fichier CSS personnalisé -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Générer CV</h1>
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <form action="gen2.php" method="POST">
                    <div class="mb-3">
                        <label for="profile" class="form-label">Profil</label>
                        <textarea class="form-control" id="profile" name="profile" rows="3" placeholder="Ajouter votre profil"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Entrez votre nom complet">
                    </div>
                    <div class="mb-3">
                        <label for="cin" class="form-label">CIN</label>
                        <input type="text" class="form-control" id="cin" name="cin" placeholder="Entrez votre CIN">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Entrez votre téléphone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Entrez votre adresse">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email">
                    </div>
                    <div class="mb-3">
                        <label for="education" class="form-label">Éducation</label>
                        <textarea class="form-control" id="education" name="education" rows="3" placeholder="Ajouter votre éducation"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="skills" class="form-label">Compétences</label>
                        <textarea class="form-control" id="skills" name="skills" rows="3" placeholder="Listez vos compétences"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="experience" class="form-label">Expérience professionnelle</label>
                        <textarea class="form-control" id="experience" name="experience" rows="3" placeholder="Listez votre expérience professionnelle"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="languages" class="form-label">Langues</label>
                        <textarea class="form-control" id="languages" name="languages" rows="3" placeholder="Ajouter les langues que vous parlez"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="interests" class="form-label">Centres d'intérêt</label>
                        <textarea class="form-control" id="interests" name="interests" rows="3" placeholder="Ajouter vos centres d'intérêt"></textarea>
                    </div>
                    <button type="submit" class="btn btn-orange">Générer CV</button>
                </form>
            </div>
        </div>
    </div>
    <script src="generercv.js"></script>
</body>
<footer class="bg-dark text-light py-4">
    <div class="container text-center">
        <p>Informations de contact de l'entreprise</p>
        <p>
            <a href="#">Politique de confidentialité</a> |
            <a href="#">Conditions d'utilisation</a>
        </p>
    </div>
</footer>
</html>
