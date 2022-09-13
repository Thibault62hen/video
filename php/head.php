<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/VCIMenu.css" rel="stylesheet">
    <title>Bienvenue au vidéo club</title>
</head>
<body>
<div id="background"></div>
    <header>
        <div id="imagegauche">
            <a href="VCIAccueil.php"><img src="../pictures/DesignVideoClub/VCLogo.gif"></a>
        </div>
        <div id="texte">
            <h1>Vidéo-Club</h1><br>
            <h3>... et si on se faisait une toile , à la maison?</h3>
        </div>
        <div id="datedroite">
            <p id=date1></p>
        <script>
            var date = new Date();
            var options = {weekday: "long", year: "numeric", month: "long", day: "2-digit"};
            document.getElementById("date1").innerHTML = date.toLocaleDateString("fr-FR", options);
        </script>
        </div>
        <div id="Admin">
            <span>Admin</span>
        </div>
        <div id="sous-Admin">
            <form method="post" action="VCIAdmin.php">
                    <label for="inputLogin">Login :</label>
                    <input type="text" id="inputLogin" name="Nom_Admin">
                    <br/>
                    <label for="inputPassword">Password :</label>
                    <input type="password"  id="inputPassword" name="Pass_Admin">
                    <br/>
                    <button type="submit">Entrer</button>
            </form>
        </div>
        <script>
        function AfficherSousMenu() {
            if(document.getElementById("sous-Admin").style.visibility == "hidden"){
                document.getElementById("sous-Admin").style.visibility = "visible";
            }
            else
            {
                document.getElementById("sous-Admin").style.visibility = "hidden";
            }
        }
        window.addEventListener('load', function () {
        document.getElementById("Admin").addEventListener("click", AfficherSousMenu);
        });
        </script>
    </header>
    <nav>
        <p><a href="VCIResa.php">Réserver un film</a></p>
        <p><a href="VCIConstr.php">Les Boutiques VC</a></p>
        <p><a href="VCIConstr.php">Actualités</a></p>
        <p><a href="VCIResa.php">Nous contacter</a></p>
    </nav>
</body>
</html>