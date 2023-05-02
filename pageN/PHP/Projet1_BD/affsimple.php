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
        
        
        $requete="select * from eleves";   
        $resultat=mysqli_query($conn, $requete);
    ?>
   
    <?php while($enreg=mysqli_fetch_array($resultat))
    { echo $enreg["num_eleve"];
        echo (", ");
        echo $enreg["nom_eleve"];
        echo (", ");
        echo $enreg["numtel_eleve"];
        echo (", ");
        echo $enreg["adesse_eleve"];
        echo ("<br>");
    }
        ?>

    </center>
    <a href="projet1.html">Accueil</a>



</body>

</html> 
