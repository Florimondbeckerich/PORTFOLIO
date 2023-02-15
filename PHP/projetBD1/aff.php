<HTML>
    <head>
        <title> La gestion d'une base de données Mysql en Php </title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        $idc=mysql_connect ("localhost","root","");
        $c=mysql_select_db("scolarite");
        $requete="select * from eleves";   
        $resultat=mysql_query($requete);
        echo mysql_num_rows($resultat);
    ?>
    <table border=1>
        <tr>
            <td>num_eleve</td>
            <td>nomeleve</td>
            <td>numtel_eleve</td>
            <td>adresse_eleve</td>
        </tr>
    <?php while($enreg=mysql_fetch_array($resultat))
    {
        ?>
    <tr>
        <td><?php echo $enreg["num_eleve"];?></td>
        <td><?php echo $enreg["nom_eleve"];?></td>
        <td><?php echo $enreg["numtel_eleve"];?></td>
        <td><?php echo $enreg["adresse_eleve"];?></td>
    </tr>
    <?php } ?>
    </table>
    <?php 
    mysql_close ($idc) ;
    ?>
    </body>
