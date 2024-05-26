<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête SQL pour vérifier l'existence de l'administrateur
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    // Vérifier si l'administrateur existe dans la base de données
    if ($result->num_rows == 1) {
        // Authentification réussie, rediriger vers une page sécurisée
        $_SESSION['login_user'] = $email;
        header("location: Authentification.php"); // Remplacez 'dashboard.php' par votre page sécurisée
    } else {
        // Identifiants incorrects, afficher un message d'erreur
        echo "<script>alert('Identifiants incorrects');</script>";
    }
}
?>
