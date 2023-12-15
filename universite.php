<?php
    $apiUrl = 'http://localhost:8090/universites/universites';

    $response = file_get_contents($apiUrl);

    if ($response === FALSE) {
        $data = array();
    } else {
        $data = json_decode($response, TRUE);
    }

    function deleteUniversite($id) {
        $apiUrl = 'http://localhost:8090/universites/deleteuniversite/' . $id;

        $context = stream_context_create(['http' => ['method' => 'DELETE']]);
        $result = file_get_contents($apiUrl, false, $context);

        if ($result === FALSE) {
            echo 'Erreur lors de la suppression de l\'université.';
        } else {
            echo 'Université supprimée avec succès!';
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteUniversiteId'])) {
        $idToDelete = $_POST['deleteUniversiteId'];
        deleteUniversite($idToDelete);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Consumer with PHP</title>
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

    <h1>Universités</h1>
    <a href="addUniversite.php">Add</a>

    <?php echo '<table border="1">'; ?>
    <?php echo '<tr><th>ID</th><th>Nom</th><th>Adresse</th><th>Action</th></tr>'; ?>
    <?php foreach ($data as $universite): ?>
        <?php echo '<tr>'; ?>
        <?php echo '<td>' . $universite['idUniversite'] . '</td>'; ?>
        <?php echo '<td>' . $universite['nomUniversite'] . '</td>'; ?>
        <?php echo '<td>' . $universite['adesse'] . '</td>'; ?>
        <?php echo '<td>'; ?>
        <?php
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="deleteUniversiteId" value="' . $universite['idUniversite'] . '">';
            echo '<button type="submit">Delete</button>';
            echo '</form>';
        ?>
        <?php echo '</td>'; ?>
        <?php echo '</tr>'; ?>
    <?php endforeach; ?>
    <?php echo '</table>'; ?>

</body>
</html>