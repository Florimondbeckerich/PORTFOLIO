
<head>
        <title> La gestion d'une base de données Mysql en Php </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
        
        session_start();
        echo " La session  est encore ouverte ! L'utilisateur est encore connecté <br>";
        echo $_SESSION["nom"],"  ";
        echo $_SESSION["prenom"];
        ?>

<?php
@include("connexion.php");
$code=$_GET['num_eleve'];
$sql = "DELETE FROM eleves WHERE num_eleve = '$code'";
mysqli_query($conn, $sql);

header('location:affichagespeciale.php');
exit;

mysqli_close($conn);
?>