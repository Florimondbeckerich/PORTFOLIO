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
    
        
        echo '<h3><a href="logue.php">Deconnexion</a></h3>';
        
        
        
        $a= $_POST['Num'];
        $requete="select * from eleves where num_eleve='$a'";
        $resultat=mysqli_query($conn, $requete);
        
        $enreg=mysqli_fetch_array($resultat);

        echo'<input type="text" value="', $enreg["num_eleve"].'">';
        echo'<input type="text" value="', $enreg["nom_eleve"].'">';
        echo'<input type="text" value="', $enreg["numtel_eleve"].'">';
        echo'<input type="text" value="', $enreg["adesse_eleve"].'">';


        mysqli_close($conn);
        ?>
<br><a href="projet1.php">Accueil</a></br>   

</body>
</html> 
