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
                <form method="post" action="recherche3.php">
            <td><?php echo "<a href='recherche3.php?num_eleve=".$enreg['num_eleve']."''>Rechercher</a>";?></td>
                </from>
            </tr>
            <?php }?>
        </table>
        <br>
        <center><a href="projet1.php">Retour au menu</a></center>
        <?php 
        mysqli_close($conn); ?>
</body>
</html>