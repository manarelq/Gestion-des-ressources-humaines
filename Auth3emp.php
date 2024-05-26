<?php
session_start();
include 'config.php';

$error = false; // Variable pour suivre l'état d'erreur

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM employe WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['login_user'] = $email;
        header("location: pageemploye.php");
    } else {
        $error = true; // Authentification échouée
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Authentification.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">                
            </div>
            

            <div class="col-md-6 right">
                <div class="input-box">
                    <div class="logo">
                        <img src="logovala.png" alt="Logo de l'entreprise">
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="input-field">
                            <input type="text" class="input" id="email" name="email" required="" autocomplete="off">
                            <label for="email">identifiant</label> 
                            <img src="utilisateur (2).png" alt="Email Icon">
                        </div> 
                        <div class="input-field">
                            <input type="password" class="input" id="pass" name="password" required="">
                            <label for="pass">mot de passe</label>
                            <img src="mot de passe.png" alt="Password Icon">
                        </div> 
                        <div class="input-field">
                            <input type="submit" class="submit" value="connexion">
                        </div> 
                    </form>
                    <?php if ($error): ?>
                        <div class="error-message">Identifiants incorrects</div>
                    <?php endif; ?>
                    <div class="signin">
                        <span><a href="reniemp.php">Rénitialiser le mot de passe <a href="#"></a></span>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
</body>
</html>
