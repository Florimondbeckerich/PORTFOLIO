<HTML>
    <head>
        <title> La gestion d'une base de données Mysql en Php </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        @include("connexion.php");
        session_start();

        echo " La session  est encore ouverte ! L'utilisateur est encore connecté <br>";
        echo $_SESSION["nom"];
        echo $_SESSION["prenom"];
    
        
        echo '<h3><a href="projet1.php">Deconnexion</a></h3>';
   
   
   
   
   ?>
   <form action="" method="post">
    <h2> Séléction </h2>
    <p>Séléctionnez un élève :</p>
    <select name="numero" size="1">
    
    <?php
    $requete="select num_eleve, nom_eleve from eleves order by num_eleve;";
    $resultat= mysqli_query($conn, $requete);
    while ($ligne=mysqli_fetch_assoc($resultat))
    {
    ?>
    <?php echo'<option value = "'. $ligne["num_eleve"]. '">'. $ligne["nom_eleve"] . '</option>?>';?>

    <?php }?>
</select>
</from>
<h3><a href="projet1.html">Retour au menu</a></h3>
<?php mysqli_close($conn); ?>
    </body>
</html> 
