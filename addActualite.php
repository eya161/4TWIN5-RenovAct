<?php
    // Initialize default values
    $title = '';
    $content = '';
    $author = '';
    $status = '';
    $category = '';
    $toWhomEmails = '';

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form values
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $status = $_POST['status'];
        $category = $_POST['category'];

        // Modify the following line to correctly handle multiple email addresses
        $toWhomEmails = explode(',', $_POST['toWhomEmails']);

        // Build data to send to the API
        $data = [
            'title' => $title,
            'content' => $content,
            'author' => $author,
            'status' => $status,
            'category' => $category,
            'toWhomEmails' => $toWhomEmails
        ];

        // Build API URL for adding an Actualite
        $apiUrl = 'http://localhost:8090/actualite/add';

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
    <h1>Add Actualite</h1>

    <form method="post" action="">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
        <br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($content); ?></textarea>
        <br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($author); ?>" required>
        <br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($status); ?>" required>
        <br>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($category); ?>" required>
        <br>

        <label for="toWhomEmails">To Whom Emails (comma-separated):</label>
<input type="text" id="toWhomEmails" name="toWhomEmails" value="<?php echo htmlspecialchars($toWhomEmails); ?>" required>
<br>

        <button type="submit">Add Actualite</button>
    </form>
</body>
</html>