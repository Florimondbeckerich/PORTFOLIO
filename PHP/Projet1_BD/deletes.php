<?php
        
        session_start();
        echo " La session  est encore ouverte ! L'utilisateur est encore connecté <br>";
        echo $_SESSION["nom"],"  ";
        echo $_SESSION["prenom"];
        
        echo '<h3><a href="projet1.php">Deconnexion</a></h3>';
        ?>


<center>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<form method="POST" ACTION="delete.php">
<table border=1>
    <tr>
        <td colspan="2"> Identifiant :<INPUT TYPE="text" NAME="Num" VALUE=""> </td>
    </tr>

    <tr>
        <td> <input type="reset" value="Annuler"></td>
        <td> <input type="submit" value="Valider"></td>
    </tr>
</table>
<br>
<a href="projet1.html">Accueil</a>

</form>
</center>