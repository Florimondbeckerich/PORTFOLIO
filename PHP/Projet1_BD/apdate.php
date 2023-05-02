<!DOCTYPE html>
<html>
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
       
<?php include('connexion.php');
$nom=addslashes($_POST["nom_eleve"]);
$nom=addslashes($_POST["nom_eleve"]);
$numtel_eleve=addslashes($_POST["numtel_eleve"]);
$adesse_eleve=addslashes($_POST["adesse_eleve"]);

$requete="update eleves set num_eleve = ".$_POST["num_eleve"].", nom_eleve ='".$nom."', numtel_eleve = '".$numtel_eleve."', adesse_eleve ='".$adesse_eleve."' where num_eleve=".$_POST["num_eleve"].";";

echo $requete;

$resultat= mysqli_query($conn, $requete);

if (!$resultat)

{ echo "<h1>echec de la requête $requete</h1>";

echo mysqli_error($conn);}

else

if (mysqli_affected_rows($conn))

echo "<h1>mise a jour effectuée</h1>"; 
echo '<h3><a href="projet1.html">RETOUR au menu</a></h3>'; 

mysqli_close($conn);

?>

</body>

</html>