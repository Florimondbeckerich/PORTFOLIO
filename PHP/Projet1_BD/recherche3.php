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
        $code=$_GET['num_eleve'];
        $requete="SELECT * from eleves where num_eleve='$code'";
        $resultat=mysqli_query($conn, $requete);
        ?>
         <table border=1>
        <tr>
            <td>num_eleve</td>
            <td>nom_eleve</td>
        </tr>
        <?php while($enreg=mysqli_fetch_array($resultat))
    {
        ?>
    <tr>
        <td><?php echo $enreg["num_eleve"];?></td>
        <td><?php echo $enreg["nom_eleve"];?></td>
    </tr>
    <?php } ?>
    </center>
    </table>
    </center>
    <center><a href="recherchespeciale.php">Retour au menu</a></center>    
</body>
</html> 
