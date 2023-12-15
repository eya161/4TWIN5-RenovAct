<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        nav {
            background-color: #444;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #555;
        }

        .active {
            background-color: #555;
        }

        @media screen and (max-width: 600px) {
            nav a {
                float: none;
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Uni Connect</h1>
    </header>

    <nav>
        <a class="active" href="index.php">Home</a>
        <a href="micro.php">Department</a>
        <a href="Chambre.php">Chambre</a>
        <a href="foyer.php">Foyer</a>
        <a href="bloc.php">Bloc</a>
        <a href="classe.php">Classe</a>
        <a href="actualite.php">Actualite</a>
        <a href="universite.php">Universite</a>
        <a href="reservation.php">Reservation</a>
    </nav>

    <div>
        <!-- Your content goes here -->
        <p>Welcome to my website!</p>
    </div>

</body>
</html>