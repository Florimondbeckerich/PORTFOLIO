<body>
<html>
<?php

        mysql_connect ("localhost","root", ""); 
        mysql_select_db("scolarite");
        $a=$_POST["login"];
        $b=$_POST["motdepasse"];
        $requete="SELECT * from users where login= '$a' and motdepasse= '$b'";
        $resultat=mysql_query($requete);
        $ligne=mysql_num_rows($resultat);
        
        if ($ligne=-1)
            header("location:projet.html");
        else
            header("location:userfail.html");
?>
</body> 
</html>