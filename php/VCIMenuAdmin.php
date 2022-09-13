<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/VCIMenu.css" rel="stylesheet">
    <title>Bienvenue au vidéo club</title>
</head>
<body style="background-color: cyan;">
    <header>
        <div id="imagegauche">
            <a href="VCIAdmin.php"><img src="../pictures/DesignVideoClub/VCLogo.gif"></a>
        </div>
        <div id="texte">
            <h1>Vidéo-Club</h1><br>
            <h3>Administration</h3>
        </div>
        <div id="datedroite">
            <p id=date1></p>
        <script>
            var date = new Date();
            var options = {weekday: "long", year: "numeric", month: "long", day: "2-digit"};
            document.getElementById("date1").innerHTML = date.toLocaleDateString("fr-FR", options);
        </script>
        </div>
    </header>
    <nav>
        <p><a href="VCINewFilm.php">Nouveau film</a></p>
        <p><a href="">...</a></p>
        <p><a href="">...</a></p>
        <p><a href="">...</a></p>
    </nav>
    <h1>Bienvenue sur le site administration du vidéo-club!</h1>
</body>
</html>