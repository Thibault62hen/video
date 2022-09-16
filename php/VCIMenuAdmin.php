<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../js/java.js"></script>
    <link href="../css/effets.css" rel="stylesheet">
    <link href="../css/VCIMenu.css" rel="stylesheet">
    <title>Section Admin</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="VCIAccueil.php" class="navbar-brand">
                    <img src="../pictures/DesignVideoClub/VCLogo.gif" width="45" alt="" class="d-inline-block align-middle mr-2">
                    <span class="text-uppercase font-weight-bold">Video-Club</span>
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#n_bar" aria-controls="navbarNavAltMarkup" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="n_bar">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="VCINewFilm.php">Ajouter un film</a></li>
                        </hr>
                        <li class="nav-item"><a class="nav-link" href="">...</a></li>
                        <li class="nav-item"><a class="nav-link" href="">...</a></li>
                        <li class="nav-item"><a class="nav-link" href="">...</a></li>
                    </ul>
                </div>
                <div id="Admin">
                    <button type="button" class="btn btn-dark">Admin</button>
                </div>
            </div>
    </header>
    <p class="d-flex flex-row" id=date1></p>
    <h1>Bienvenue sur la section Admin</h1>
    <div class="d-flex justify-content-right">
    <div id="sous-Admin">
        <form method="post" action="VCIAdmin.php">
                <label for="inputLogin">Login :</label>
                <input type="text" id="inputLogin" name="Nom_Admin">
</br>
                <label for="inputPassword">Password :</label>
                <input type="password" id="inputPassword" name="Pass_Admin">
                </br>
            <button type="submit" class="bn632-hover bn26">Connexion</button>
        </form>
    </div>
</div>
    <script>
        var date = new Date();
        var options = {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "2-digit"
        };
        document.getElementById("date1").innerHTML = date.toLocaleDateString("fr-FR", options);
    </script>
</body>

</html>
<?php require "pied.php";?>