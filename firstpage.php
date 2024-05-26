<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="firstpage.css">
<title>Choix de Connexion</title>

</head>
<body>
<div class="background"></div>

<div class="container">
    <h2>Choisissez votre type de connexion :</h2>
    <a href="Authentification.php"><button id="admin-btn">Administrateur</button></a>
   <a href="Auth2res.php"> <button id="responsable-btn">Responsable</button></a>
    <a href="Auth3emp.php"><button id="employe-btn">Employé</button></a>
</div>

<script>
    // Récupérer les boutons de connexion
    const adminBtn = document.getElementById('admin-btn');
    const responsableBtn = document.getElementById('responsable-btn');
    const employeBtn = document.getElementById('employe-btn');

    // Ajouter des écouteurs d'événements pour chaque bouton
    adminBtn.addEventListener('click', function() {
        // Redirection vers la page d'administration
        window.location.href = '/admin/login';
    });

    responsableBtn.addEventListener('click', function() {
        // Redirection vers la page de connexion du responsable
        window.location.href = '/responsable/login';
    });

    employeBtn.addEventListener('click', function() {
        // Redirection vers la page de connexion de l'employé
        window.location.href = '/employe/login';
    });
</script>

</body>
</html>
