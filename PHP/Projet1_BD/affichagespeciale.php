<HTML>
    <head>
        <title> La gestion d'une base de données Mysql en Php </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
        
        session_start();
        echo " La session  est encore ouverte ! L'utilisateur est encore connecté <br>";
        echo $_SESSION["nom"],"  ";
        echo $_SESSION["prenom"];
        echo '<h3><a href="projet1.php">Deconnexion</a></h3>';
       ?>
       
  <?php
        @include("connexion.php");
        $requete="select * from eleves";
        $resultat=mysqli_query($conn, $requete);
        ?>
        <br><br>

        <center><h1>Affichage de tous les eleves</h1></center>

        <table width=100% border=1>
            <tr>
                <td> numero eleve : </td>
                <td> Nom eleve : </td>
            </tr>
            <?php 
                while($enreg=mysqli_fetch_array($resultat))
                {
                    ?>
            <tr>
            <td><?php echo $enreg["num_eleve"]; ?></td>
            <td><?php echo $enreg["nom_eleve"]; ?></td>
                <form method="post" action="suppprimer2.php">
            <td><?php echo "<a href='supprimer2.php?num_eleve=".$enreg['num_eleve']."''>Supprimer</a>";?></td>
                </from>
            </tr>
            <?php }?>
        </table>
        <br>
        <center><a href="projet1.html">Retour au menu</a></center>
        <?php 
        mysqli_close($conn); ?>
</body>
</html>