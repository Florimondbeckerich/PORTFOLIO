<HTML>
    <head>
    <meta charset="utf-8">
</head>
<body>
    <center>
    <?php
        @include("connexion.php");
        session_start();

    echo " La session  est encore ouverte ! L'utilisateur est encore connecté <br>";
    echo $_SESSION["nom"];
    echo $_SESSION["prenom"];

    
    echo '<h3><a href="conexion.html">Deconnexion</a></h3>';
       
       
       
        $a = $_POST['num'];
        $requete="SELECT * FROM eleves WHERE num_eleve='$a'";
        $resultat=mysql_query($requete);
        echo "Voici les informations concernant l'eleve num:" .$a;

        $enreg=mysql_fetch_array($resultat);

        echo '<form action="apdate.php" method="post">';

            echo '<input type="text" name="num" value = "'.$enreg["num_eleve"].'">';
            echo '<input type="text" name="nom" value = "'.$enreg["nom_eleve"].'">';
            
            
            echo ' <p /><input type="submit" name="Validation" value="Modifier"><p/>';
            echo ' <input type="reset" name="Annuler" value="Annuler" />';
       
       echo "</form>";
       
       mysql_close();
       ?>
        
 
    </body>
</html> 
