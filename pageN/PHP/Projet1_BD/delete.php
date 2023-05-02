<head>
        <title> La gestion d'une base de données Mysql en Php </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php 
@include("connexion.php");
session_start();

echo " La session  est encore ouverte ! L'utilisateur est encore connecté <br>";
echo $_SESSION["nom"];
echo $_SESSION["prenom"];


echo '<h3><a href="projet1.php">Deconnexion</a></h3>';





$c = $_POST['Num'];
    $requete="delete from eleves where num_eleve=$c";
    echo $requete;
    $resultat= mysqli_query($conn, $requete);
    if ( ! $resultat)
    {       echo "<h>Suppression effectuée $requete</h1>";
            echo mysqli_error($connexion);
    }
    else
        if (mysqli_affected_rows ($conn) )
            echo "<h1>Suppression effectuée</h1>";
            echo '<h3><a href="projet1.html">RETOUR au menu</a></h3>';
            mysqli_close($conn);
?>