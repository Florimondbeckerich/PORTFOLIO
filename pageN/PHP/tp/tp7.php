<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1> Affichage des données de saisies </h1>

        <?php
            $a=$_REQUEST['name'];
            $b=$_REQUEST['password'];
            if ($a=="admin" and $b=="admin")
            {
            echo "Bienvenue M. $a : votre mot de passe est correct".".<br>";
            echo "Vous êtes connecté le ".date("d/m/y")."<br>";
            echo "Il est ".date("h:i:s")."!";
            } 
            else 
            echo "M. $a votre mot de passe est incorrect"."<br>";
        ?>
        <input type=button value="retour" onclick="self.history.back();">
    </body>
</html>

