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
        echo mysqli_num_rows($resultat);
    ?>
    <table border=1>
        <tr>
            <td>code_eleve</td>
            <td>nom_eleve</td>
            <td>numtel_eleve</td>
            <td>adresse_eleve</td>
        </tr>
    <?php while($enreg=mysqli_fetch_array($resultat))
    {
        ?>
    <tr>
        <td><?php echo $enreg["num_eleve"];?></td>
        <td><?php echo $enreg["nom_eleve"];?></td>
        <td><?php echo $enreg["numtel_eleve"];?></td>
        <td><?php echo $enreg["adesse_eleve"];?></td>
    </tr>
    <?php } ?>
    </center>
    </table>
    <a href="projet1.php">Accueil</a>
    </body>
</html> 
