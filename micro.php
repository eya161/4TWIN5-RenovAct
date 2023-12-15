<?php
    // URL de l'API pour récupérer la liste des départements
    $apiUrl = 'http://localhost:8090/departments/department';

    // Effectuer une requête GET
    $response = file_get_contents($apiUrl);

    // Vérifier si la requête a réussi
    if ($response === FALSE) {
        $data = array(); // En cas d'erreur, initialisez un tableau vide
    } else {
        // Convertir la réponse JSON en tableau associatif
        $data = json_decode($response, TRUE);
    }

    

    // Fonction pour supprimer un département
    function deleteDepartment($id) {
        // Construire l'URL de l'API pour supprimer le département
        $apiUrl = 'http://localhost:8090/departments/deleteDepartment/' . $id;

        // Effectuer une requête DELETE vers l'API
        $context = stream_context_create(['http' => ['method' => 'DELETE']]);
        $result = file_get_contents($apiUrl, false, $context);

        // Vérifier si la requête a réussi
        if ($result === FALSE) {
            echo 'Erreur lors de la suppression du département.';
        } else {
            echo 'Département supprimé avec succès!';
        }
    }

    // Vérifier si le formulaire de suppression a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteDepartmentId'])) {
        $idToDelete = $_POST['deleteDepartmentId'];
        deleteDepartment($idToDelete);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Consumer with PHP</title>
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

    <h1>Department</h1>
    <a href="addDepartment.php">Add</a>

  

    <?php echo '<table border="1">'; ?>
    <?php echo '<tr><th>ID</th><th>Name</th><th>Classes</th><th>Floors</th><th>Action</th></tr>'; ?>
    <?php foreach ($data as $department): ?>
        <?php echo '<tr>'; ?>
        <?php echo '<td>' . $department['idDepartment'] . '</td>'; ?>
        <?php echo '<td>' . $department['nomDepartment'] . '</td>'; ?>
        <?php echo '<td>' . $department['nombreClasses'] . '</td>'; ?>
        <?php echo '<td>' . $department['nombreEtage'] . '</td>'; ?>
        <?php echo '<td>'; ?>
        <?php
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="deleteDepartmentId" value="' . $department['idDepartment'] . '">';
            echo '<button type="submit">Delete</button>';
            echo '</form>';
        ?>
        <?php echo '</td>'; ?>
        <?php echo '</tr>'; ?>
    <?php endforeach; ?>
    <?php echo '</table>'; ?>

</body>
</html>