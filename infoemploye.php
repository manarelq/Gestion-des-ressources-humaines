<?php
include 'config.php';

// Définir des variables pour stocker les données du formulaire
$firstname = $lastname = $cin = $birthdate = $birthplace = $gender = $maritalstatus = $address = $phone = $mobile = $email = $hiredate = $currentposition = $seatofappointment = $mission = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Utiliser isset pour vérifier si les données sont définies dans $_POST
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $cin = isset($_POST['cin']) ? $_POST['cin'] : '';
    $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
    $birthplace = isset($_POST['birthplace']) ? $_POST['birthplace'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $maritalstatus = isset($_POST['maritalstatus']) ? $_POST['maritalstatus'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $hiredate = isset($_POST['hiredate']) ? $_POST['hiredate'] : '';
    $currentposition = isset($_POST['currentposition']) ? $_POST['currentposition'] : '';
    $seatofappointment = isset($_POST['seatofappointment']) ? $_POST['seatofappointment'] : '';
    $mission = isset($_POST['mission']) ? $_POST['mission'] : '';

    // Ici, vous pouvez ajouter le code pour enregistrer les données dans la base de données
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'employé</title>
    <link rel="stylesheet" href="infoemploye.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="profile">
            <div class="profile-header bg-orange">
                <h1 class="profile-title">Informations Personnelles</h1>
            </div>
            <img src="picprfl.jpg" alt="Photo de profil" class="profile-picture">

            <div class="profile-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required placeholder="Entrez le prénom" value="<?php echo htmlspecialchars($firstname); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required placeholder="Entrez le nom" value="<?php echo htmlspecialchars($lastname); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin" name="cin" required placeholder="Entrez le CIN" value="<?php echo htmlspecialchars($cin); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="birthdate" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required placeholder="Entrez la date de naissance" value="<?php echo htmlspecialchars($birthdate); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="birthplace" class="form-label">Lieu de naissance</label>
                            <input type="text" class="form-control" id="birthplace" name="birthplace" required placeholder="Entrez le lieu de naissance" value="<?php echo htmlspecialchars($birthplace); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Sexe</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="">Choisissez votre sexe</option>
                                <option value="homme" <?php if($gender == 'homme') echo 'selected'; ?>>Homme</option>
                                <option value="femme" <?php if($gender == 'femme') echo 'selected'; ?>>Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="maritalstatus" class="form-label">État matrimonial</label>
                            <select class="form-select" id="maritalstatus" name="maritalstatus" required>
                                <option value="">Choisissez votre état matrimonial</option>
                                <option value="célibataire" <?php if($maritalstatus == 'célibataire') echo 'selected'; ?>>Célibataire</option>
                                <option value="en couple" <?php if($maritalstatus == 'en couple') echo 'selected'; ?>>En couple</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="address" name="address" required placeholder="Entrez l'adresse" value="<?php echo htmlspecialchars($address); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Téléphone fixe</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Entrez le fixe" value="<?php echo htmlspecialchars($phone); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Téléphone mobile</label>
                            <input type="tel" class="form-control" id="mobile" name="mobile" required placeholder="Entrez le téléphone mobile" value="<?php echo htmlspecialchars($mobile); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Entrez l'email" value="<?php echo htmlspecialchars($email); ?>">
                        </div>
                    </div>

                    <div class="profile-header bg-orange mt-5">
                        <h1 class="profile-title">Situation Administrative</h1>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="hiredate" class="form-label">Date de recrutement</label>
                            <input type="date" class="form-control" id="hiredate" name="hiredate" required value="<?php echo htmlspecialchars($hiredate); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="currentposition" class="form-label">Cadre actuel</label>
                            <input type="text" class="form-control" id="currentposition" name="currentposition" required placeholder="Entrez le cadre actuel" value="<?php echo htmlspecialchars($currentposition); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="seatofappointment" class="form-label">Siège de nomination</label>
                            <input type="text" class="form-control" id="seatofappointment" name="seatofappointment" required placeholder="Entrez le siège de nomination" value="<?php echo htmlspecialchars($seatofappointment); ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="mission" class="form-label">Mission</label>
                            <input type="text" class="form-control" id="mission" name="mission" required placeholder="Entrez la mission" value="<?php echo htmlspecialchars($mission); ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-orange">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
