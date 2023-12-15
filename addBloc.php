<?php
    // Initialize default values
    $nomBloc = '';
    $capaciteBloc = 0;

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form values
        $nomBloc = $_POST['nomBloc'];
        $capaciteBloc = $_POST['capaciteBloc'];

        // Build data to send to the API
        $data = [
            'nomBloc' => $nomBloc,
            'capaciteBloc' => $capaciteBloc
        ];

        // Build API URL for adding a bloc
        $apiUrl = 'http://localhost:8090/blocs/addbloc';

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
    <h1>Add Bloc</h1>

    <form method="post" action="">
        <label for="nomBloc">Bloc Name:</label>
        <input type="text" id="nomBloc" name="nomBloc" value="<?php echo htmlspecialchars($nomBloc); ?>" required>
        <br>

        <label for="capaciteBloc">Bloc Capacity:</label>
        <input type="number" id="capaciteBloc" name="capaciteBloc" value="<?php echo htmlspecialchars($capaciteBloc); ?>" required>
        <br>

        <button type="submit">Add Bloc</button>
    </form>
</body>
</html>