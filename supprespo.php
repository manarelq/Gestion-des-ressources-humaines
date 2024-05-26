<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer Responsable</title>
    <link rel="stylesheet" href="supprespo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-supprimer text-orange p-4">
        <h1 class="text-center">Supprimer Responsable</h1>
    </header>
    <div class="container mt-5">
        <form action="supprimer_responsable.php" method="post">
            <div class="form-group">
                <label for="Responsable" class="form-label">Responsable à supprimer :</label>
                <select id="Responsable" name="Responsable" class="form-select" required>
                    <option value="" disabled selected>Choisissez un responsable</option>
                    <?php
                    include 'config.php';
                    $sql = "SELECT id, nom FROM responsables";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . $row['id'] . "\">" . $row['nom'] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </div>
        </form>
    </div>
</body>
</html>
