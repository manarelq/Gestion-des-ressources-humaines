<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = ""; // Mettez votre mot de passe MySQL ici si vous en avez un
$dbname = "sfe";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Initialiser les variables
$profile = '';
$full_name = '';
$cin = '';
$phone = '';
$address = '';
$email = '';
$education = '';
$skills = '';
$experience = '';
$languages = '';
$interests = '';

// Vérifiez si les données du formulaire sont envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $profile = isset($_POST['profile']) ? $_POST['profile'] : '';
    $full_name = isset($_POST['fullName']) ? $_POST['fullName'] : '';
    $cin = isset($_POST['cin']) ? $_POST['cin'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $education = isset($_POST['education']) ? $_POST['education'] : '';
    $skills = isset($_POST['skills']) ? $_POST['skills'] : '';
    $experience = isset($_POST['experience']) ? $_POST['experience'] : '';
    $languages = isset($_POST['languages']) ? $_POST['languages'] : '';
    $interests = isset($_POST['interests']) ? $_POST['interests'] : '';

    // Insérer les données dans la base de données
    $sql = "INSERT INTO cv_information (profile, full_name, cin, phone, address, email, education, skills, experience, languages, interests)
            VALUES ('$profile', '$full_name', '$cin', '$phone', '$address', '$email', '$education', '$skills', '$experience', '$languages', '$interests')";

    if ($conn->query($sql) === TRUE) {
        $message = "New record created successfully";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $message = "No form data submitted";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générer CV</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="gen2.css">
</head>
<body>
    <div class="container">
        <h1>Générer CV</h1>
        <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
        
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
            <div class="profile-section">
                <h2>Profil</h2>
                <p><?php echo nl2br(htmlspecialchars($profile)); ?></p>
            </div>
            <div class="info-section">
                <h2>Informations Personnelles</h2>
                <p><strong>Nom complet:</strong> <?php echo htmlspecialchars($full_name); ?></p>
                <p><strong>CIN:</strong> <?php echo htmlspecialchars($cin); ?></p>
                <p><strong>Téléphone:</strong> <?php echo htmlspecialchars($phone); ?></p>
                <p><strong>Adresse:</strong> <?php echo htmlspecialchars($address); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            </div>
            <div class="education-section">
                <h2>Éducation</h2>
                <p><?php echo nl2br(htmlspecialchars($education)); ?></p>
            </div>
            <div class="skills-section">
                <h2>Compétences</h2>
                <p><?php echo nl2br(htmlspecialchars($skills)); ?></p>
            </div>
            <div class="experience-section">
                <h2>Expérience Professionnelle</h2>
                <p><?php echo nl2br(htmlspecialchars($experience)); ?></p>
            </div>
            <div class="languages-section">
                <h2>Langues</h2>
                <p><?php echo nl2br(htmlspecialchars($languages)); ?></p>
            </div>
            <div class="interests-section">
                <h2>Centres d'Intérêt</h2>
                <p><?php echo nl2br(htmlspecialchars($interests)); ?></p>
            </div>
            <div class="button-section">
                <button id="btnSave" class="btn btn-orange">Enregistrer en PDF</button>
            </div>
        <?php endif; ?>
    </div>

    <script>
        document.getElementById('btnSave').addEventListener('click', function() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.text(20, 20, 'Mon CV');
            doc.text(20, 30, 'Nom complet: <?php echo addslashes($full_name); ?>');
            doc.text(20, 40, 'CIN: <?php echo addslashes($cin); ?>');
            doc.text(20, 50, 'Téléphone: <?php echo addslashes($phone); ?>');
            doc.text(20, 60, 'Adresse: <?php echo addslashes($address); ?>');
            doc.text(20, 70, 'Email: <?php echo addslashes($email); ?>');

            doc.text(20, 80, 'Profil:');
            doc.text(20, 90, '<?php echo addslashes(nl2br(htmlspecialchars($profile))); ?>');

            doc.text(20, 100, 'Éducation:');
            doc.text(20, 110, '<?php echo addslashes(nl2br(htmlspecialchars($education))); ?>');

            doc.text(20, 120, 'Compétences:');
            doc.text(20, 130, '<?php echo addslashes(nl2br(htmlspecialchars($skills))); ?>');

            doc.text(20, 140, 'Expérience professionnelle:');
            doc.text(20, 150, '<?php echo addslashes(nl2br(htmlspecialchars($experience))); ?>');

            doc.text(20, 160, 'Langues:');
            doc.text(20, 170, '<?php echo addslashes(nl2br(htmlspecialchars($languages))); ?>');

            doc.text(20, 180, 'Centres d\'intérêt:');
            doc.text(20, 190, '<?php echo addslashes(nl2br(htmlspecialchars($interests))); ?>');

            doc.save('mon_cv.pdf');
        });
    </script>
</body>
</html>
