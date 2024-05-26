<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe</title>
    <link rel="stylesheet" href="reni.css">
</head>
<body>
    <div class="container">
        <div class="form-section">
            <div class="image-section">
                <img src="rénitialiser.png" alt="Réinitialiser le mot de passe">
            </div>
            <form action="reset_password_process2.php" method="post">
                <div class="input-field">
                    <label for="email">Identifiant</label>
                    <img src="utilisateur (2).png" alt="Email Icon">
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="input-field">
                    <select id="response" name="response" required>
                        <option value="" disabled selected>Choisissez une réponse</option>
                        <option value="0612345678">0612345678</option>
                        <option value="0712345678">0712345678</option>
                        <option value="0812345678">0812345678</option>
                    </select>
                </div>
                <div class="input-field">
                   <a href="pageemploye.php">   
                    <input type="submit" class="submit" value="Valider"></a>  
               </div>
            </form>
        </div>
    </div>
</body>
</html>
