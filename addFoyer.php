<?php
    // Initialiser les valeurs par défaut
    $nomFoyer = '';
    $capaciteFoyer = 0;
 

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les valeurs du formulaire
        $nomFoyer = $_POST['nomFoyer'];
        $capaciteFoyer = $_POST['capaciteFoyer'];

        // Construire les données à envoyer à l'API
        $data = [
            'nomFoyer' => $nomFoyer,
            'capaciteFoyer' => $capaciteFoyer
        ];

        // Construire l'URL de l'API
        $apiUrl = 'http://localhost:8090/foyers/addfoyer';

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
    <title>Add foyer</title>
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

    <h1>Add foyer</h1>

    <form method="post" action="">
    <label for="nomFoyer">nom Foyer:</label>
        <input type="text" id="nomFoyer" name="nomFoyer" value="<?php echo htmlspecialchars($nomFoyer); ?>" required>
        <br>
        <label for="capaciteFoyer">capacite Foyer:</label>
        <input type="text" id="capaciteFoyer" name="capaciteFoyer" value="<?php echo htmlspecialchars($capaciteFoyer); ?>" required>
        <br>

     

        <button type="submit">Add foyer</button>
    </form>

</body>
</html>