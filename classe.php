<?php
  
    $apiUrl = 'http://localhost:8090/classes/classe';

  
    $response = file_get_contents($apiUrl);

    
    if ($response === FALSE) {
        $data = array();
    } else {
        
        $data = json_decode($response, TRUE);
    }

   
    function deleteclasses($id) {
 
        $apiUrl = 'http://localhost:8090/classes/delete/' . $id;

       
        $context = stream_context_create(['http' => ['method' => 'DELETE']]);
        $result = file_get_contents($apiUrl, false, $context);

        if ($result === FALSE) {
            echo 'Erreur lors de la suppression du classes.';
        } else {
            echo 'classes supprimé avec succès!';
        }
    }

  
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteclassestId'])) {
        $idToDelete = $_POST['deleteclassestId'];
        deleteclasses($idToDelete);
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

    <h1>Classe</h1>
    <a href="addClasse.php">Add</a>

    <?php echo '<table border="1">'; ?>
    <?php echo '<tr><th>ID</th><th>classeName</th><th>capacity</th><th>etage</th><th>Action</th></tr>'; ?>
    <?php foreach ($data as $foyer): ?>
        <?php echo '<tr>'; ?>
        <?php echo '<td>' . $foyer['idClasse'] . '</td>'; ?>
        <?php echo '<td>' . $foyer['classeName'] . '</td>'; ?>
        <?php echo '<td>' . $foyer['capacity'] . '</td>'; ?>
        <?php echo '<td>' . $foyer['etage'] . '</td>'; ?>
        <?php echo '<td>'; ?>
        <?php
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="deleteclassestId" value="' . $foyer['idClasse'] . '">';
            echo '<button type="submit">Delete</button>';
            echo '</form>';
        ?>
        <?php echo '</td>'; ?>
        <?php echo '</tr>'; ?>
    <?php endforeach; ?>
    <?php echo '</table>'; ?>

</body>
</html>