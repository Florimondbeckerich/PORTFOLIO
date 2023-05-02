<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">   


<?php
    session_start();
    $_SESSION["nom"]=$_POST['nom'];
    $_SESSION["prenom"]=$_POST['prenom'];

    echo " La session est ouverte : <br>";
    echo $_SESSION["nom"],"  ";
    echo $_SESSION["prenom"];

    echo '<h3><a href="login.html">TRANSMETTRE</a></h3>';
?>