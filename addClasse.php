<?php
    // Initialize default values
    $classeName = '';
    $capacity = '';
    $etage = '';
    $disponibility = '';

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form values
        $classeName = $_POST['classeName'];
        $capacity = $_POST['capacity'];
        $etage = $_POST['etage'];
        $disponibility = true;

        // Build data to send to the API
        $data = [
            'classeName' => $classeName,
            'capacity' => $capacity,
            'etage' => $etage,
            'disponibility' => $disponibility
        ];

        // Build API URL for adding a Classe
        $apiUrl = 'http://localhost:8090/classes/add';

        // Perform a POST request to the API
        $options = [
            'http' => [
                'header' => "Content-type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($apiUrl, false, $context);

        // Check if the request was successful
        if ($result === FALSE) {
            echo 'Error making API request';
        } else {
            echo 'Data added successfully!';
        }
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
    <h1>Add Classe</h1>

    <form method="post" action="">
        <label for="classeName">Classe Name:</label>
        <input type="text" id="classeName" name="classeName" value="<?php echo htmlspecialchars($classeName); ?>" required>
        <br>

        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" value="<?php echo htmlspecialchars($capacity); ?>" required>
        <br>

        <label for="etage">Etage:</label>
        <input type="number" id="etage" name="etage" value="<?php echo htmlspecialchars($etage); ?>" required>
        <br>


        <button type="submit">Add Classe</button>
    </form>
</body>
</html>