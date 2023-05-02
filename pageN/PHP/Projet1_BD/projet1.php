<HTML>
    <head>
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
       
    
       <a href="conexion.html">Deconnexion</a>&nbsp;
    <center>
        <form method ="POST" action ="ajt.php">    
        <a href="recherche.html">Rechercher 1</a> 
            <a href="recherche2.html">Rechercher  2</a> 
            <a href="echid.html">Modification</a>
            <p>Saisir numéro de l'éleve : <input type="text" name="Num"></p>
            <p>Saisir nom de l'éleve: <input type="text" name="Nom"></p>
            <p>Saisir numéro de téléphone de l'éleve : <input type="text" name="Numtel"></p>
            <p>Adresse de l'éleve : <input type="text" name="adesse"></p>
            
                <input type="reset" value="Annuler">
                <input type="submit" name="Valider">
                <br>
                <a href="aff.php">Afficher la liste dans un tableau</a>&nbsp;
                <a href="affsimple.php">Afficher la liste en ligne</a>&nbsp;
                <a href="affderoulant.php">Afficher la liste déroulante</a>&nbsp;
                <a href="affichagespeciale.php">Affichage speciale</a>&nbsp;
                <a href="recherchespeciale.php">Recherhce speciale</a>&nbsp;
                <a href="login.html">Deconnexion</a>&nbsp;
                
                
                <a href="deletes.php">Supprimer</a>&nbsp;
            </table>
                
        </form>  
    </center>
    </body>
</HTML>

