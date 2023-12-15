<?php
    // Initialiser les valeurs par défaut
    
    $nomUniversite = "";
    $adresseUniversite = "";

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les valeurs du formulaire
        $nomUniversite = $_POST['nomUniversite'];
        $adresseUniversite = $_POST['adresseUniversite'];

        // Construire les données à envoyer à l'API
        $data = [
            'nomUniversite' => $nomUniversite,
            'adresse' => $adresseUniversite
        ];

        // Construire l'URL de l'API
        $apiUrl = 'http://localhost:8090/universites/adduniversite';

        // Effectuer une requête POST vers l'API
        $options = [
            'http' => [
                'header' => "Content-type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($apiUrl, false, $context);

        // Vérifier si la requête a réussi
        if ($result === FALSE) {
            echo 'Erreur lors de la requête vers l\'API';
        } else {
            echo 'Données ajoutées avec succès!';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Universite</title>
    <!-- ... (rest of the head section remains the same) ... -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        form {
            width: 50%;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, button {
            margin-bottom: 16px;
            padding: 8px;
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    <h1>Add Universite</h1>

    <form method="post" action="">
        <label for="nomUniversite">Nom:</label>
        <input type="text" id="nomUniversite" name="nomUniversite" value="<?php echo htmlspecialchars($nomUniversite); ?>" required>
        <br>
        <label for="adresseUniversite">Adresse:</label>
        <input type="text" id="adresseUniversite" name="adresseUniversite" value="<?php echo htmlspecialchars($adresseUniversite); ?>" required>
        <br>
        <button type="submit">Add Universite</button>
    </form>

    <!-- ... (rest of the body section remains the same) ... -->

</body>
</html>