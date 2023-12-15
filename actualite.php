<?php
    // Fetch data from the API
    $apiUrl = 'http://localhost:8090/actualite';
    $response = file_get_contents($apiUrl);

    // Check if the request was successful
    if ($response === FALSE) {
        $data = array();
    } else {
        $data = json_decode($response, TRUE);
    }

    // Function to delete an Actualite by ID
    function deleteActualite($id) {
        $apiUrl = 'http://localhost:8090/actualite/delete/' . $id;

        $context = stream_context_create(['http' => ['method' => 'DELETE']]);
        $result = file_get_contents($apiUrl, false, $context);

        if ($result === FALSE) {
            echo 'Error deleting Actualite.';
        } else {
            echo 'Actualite deleted successfully!';
        }
    }

    // Check if the form has been submitted for deleting an Actualite
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteActualiteId'])) {
        $idToDelete = $_POST['deleteActualiteId'];
        deleteActualite($idToDelete);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
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
    <h1>Actualites</h1>
    <a href="addActualite.php">Add</a>

    <?php echo '<table border="1">'; ?>
    <?php echo '<tr><th>ID</th><th>Title</th><th>Content</th><th>Author</th><th>Status</th><th>Category</th><th>To Whom Emails</th><th>Action</th></tr>'; ?>
    <?php foreach ($data as $actualite): ?>
        <?php echo '<tr>'; ?>
        <?php echo '<td>' . $actualite['id'] . '</td>'; ?>
        <?php echo '<td>' . $actualite['title'] . '</td>'; ?>
        <?php echo '<td>' . $actualite['content'] . '</td>'; ?>
        <?php echo '<td>' . $actualite['author'] . '</td>'; ?>
        <?php echo '<td>' . $actualite['status'] . '</td>'; ?>
        <?php echo '<td>' . $actualite['category'] . '</td>'; ?>
        <?php echo '<td>' . implode(', ', $actualite['toWhomEmails']) . '</td>'; ?>
        <?php echo '<td>'; ?>
        <?php
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="deleteActualiteId" value="' . $actualite['id'] . '">';
            echo '<button type="submit">Delete</button>';
            echo '</form>';
        ?>
        <?php echo '</td>'; ?>
        <?php echo '</tr>'; ?>
    <?php endforeach; ?>
    <?php echo '</table>'; ?>
</body>
</html>