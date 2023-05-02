<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <center>
        <?php
            include("connexion.php");
            session_start();

            echo "La session est encore ouverte ! L'utilisateur est encore connecté <br>";
            echo $_SESSION["nom"];
            echo $_SESSION["prenom"];

            echo '<h3><a href="logue.php">Deconnexion</a></h3>';

            if (isset($_POST['Num'])) {
                $a = $_POST['Num'];
                $requete = "SELECT * FROM eleves WHERE num_eleve='$a'";
                $resultat = mysqli_query($conn, $requete);
        ?>
            <table border="1">
                <tr>
                    <td>num_eleve</td>
                    <td>nom_eleve</td>
                </tr>
                <?php while($enreg=mysqli_fetch_array($resultat)) { ?>
                    <tr>
                        <td><?php echo $enreg["num_eleve"]; ?></td>
                        <td><?php echo $enreg["nom_eleve"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </center>
    <br><a href="projet1.php">Accueil</a></br>
</body>
</html>