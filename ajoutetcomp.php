<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Compétence et Diplôme</title>
    <link rel="stylesheet" href="ajouetcomp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Ajouter Compétence et Diplôme</h1>
        <div id="message-container"></div>

        <form id="ajout-form">
            <div class="mb-3">
                <label for="nom-competence" class="form-label">Nom Compétence</label>
                <input type="text" class="form-control" id="nom-competence" name="nom-competence" required>
            </div>
            <div class="mb-3">
                <label for="nom-diplome" class="form-label">Nom Diplôme</label>
                <input type="text" class="form-control" id="nom-diplome" name="nom-diplome" required>
            </div>
            <button type="submit" class="btn btn-orange">Ajouter</button>
            <a href="" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <script>
        document.getElementById('ajout-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            fetch('ajoutercomp_handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                var messageContainer = document.getElementById('message-container');
                messageContainer.innerHTML = "<div class='alert alert-success'>" + data.message + "</div>";
                document.getElementById('ajout-form').reset();
            })
            .catch(error => console.error('Erreur:', error));
        });
    </script>
</body>
</html>
