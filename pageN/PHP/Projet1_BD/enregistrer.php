<body>
    <html>
        <?php
        @include("connexion.php");
        $a=$_POST["login"];
        $b=mD5($_POST["motdepasse"]);

       
       
        $requete= "SELECT * from user where  login= '$a'and motdepasse= '$b'";
        $resultat=mysqli_query($conn, $requete);
        $ligne=mysqli_num_rows($resultat);
        if ($ligne==1)
            header("location:projet1.php");
        else
            header("location:userfail.html");
?>
</body>
<html>
