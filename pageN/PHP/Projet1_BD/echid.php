<HTML>
<head>
        <title> La gestion d'une base de données Mysql en Php </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <center>
    <?php
        @include("connexion.php");
        session_start();

        echo " La session  est encore ouverte ! L'utilisateur est encore connecté <br>";
        echo $_SESSION["nom"];
        echo $_SESSION["prenom"];
    
        
        echo '<h3><a href="projet1.php">Deconnexion</a></h3>';
        
        
        
        $a= $_POST['Num'];
        $requete="select * from eleves where num_eleve='$a'";
        $resultat=mysqli_query($conn, $requete);
        echo "Voici les informations concernant l'eleve num:" .$a;

        $enreg=mysqli_fetch_array($resultat);

        echo '<form action="apdate.php" method="post">';

        echo'<input type="text" name="num_eleve" value="', $enreg["num_eleve"].'">';
        echo'<input type="text" name="nom_eleve" value="', $enreg["nom_eleve"].'">';
        echo'<input type="text" name="numtel_eleve" value="', $enreg["numtel_eleve"].'">';
        echo'<input type="text" name="adesse_eleve"  value="', $enreg["adesse_eleve"].'">';


                    
        echo ' <p /><input type="submit" name="Validation" value="Modifier"><p/>';
        echo ' <input type="reset" name="Annuler" value="Annuler" />';
   
   echo "</form>";
   

        mysqli_close($conn);
        ?>
        <a href="projet1.html">Accueil</a>
    </body>
</html> 
 
