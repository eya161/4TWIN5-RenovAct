<?php
    // Initialiser les valeurs par défaut
    $nomDepartment = '';
    $nombreClasses = 0;
    $nombreEtage = 0;

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les valeurs du formulaire
        $nomDepartment = $_POST['nomDepartment'];
        $nombreClasses = $_POST['nombreClasses'];
        $nombreEtage = $_POST['nombreEtage'];

        // Construire les données à envoyer à l'API
        $data = [
            'nomDepartment' => $nomDepartment,
            'nombreClasses' => $nombreClasses,
            'nombreEtage' => $nombreEtage
        ];

        // Construire l'URL de l'API
        $apiUrl = 'http://localhost:8090/departments/addDepartment';

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
    <title>Add Department</title>
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

    <h1>Add Department</h1>

    <form method="post" action="">
        <label for="nomDepartment">Name:</label>
        <input type="text" id="nomDepartment" name="nomDepartment" value="<?php echo htmlspecialchars($nomDepartment); ?>" required>
        <br>

        <label for="nombreClasses">Number of Classes:</label>
        <input type="number" id="nombreClasses" name="nombreClasses" value="<?php echo htmlspecialchars($nombreClasses); ?>" required>
        <br>

        <label for="nombreEtage">Number of Floors:</label>
        <input type="number" id="nombreEtage" name="nombreEtage" value="<?php echo htmlspecialchars($nombreEtage); ?>" required>
        <br>

        <button type="submit">Add Department</button>
    </form>

</body>
</html>