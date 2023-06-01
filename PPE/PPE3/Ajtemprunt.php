<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">   
</head>
<body>
    
<?php
session_start();
?>
    <?php
    include('header.html');  

include('connecte.php'); // inclure la connexion à la base de données
$sql_livre = "SELECT * FROM livre";
$stmt_livre = $conn->prepare($sql_livre);
$stmt_livre->execute();
$livre = $stmt_livre->fetchAll();
$sql_usager = "SELECT * FROM usager";
$stmt_usager = $conn->prepare($sql_usager);
$stmt_usager->execute();
$usager = $stmt_usager->fetchAll();
?>
    <center>
    <form method="POST" action="Ajtemprunts.php">
    <input type="hidden" name="id_emprunt" value="<?php echo $emprunt['id_emprunt']; ?>">    
    <p>Saisir le titre: </p>
        <select name="id_livre">
                <?php foreach ($livre as $livre): ?>
                    <option value="<?php echo $livre['id_livre']; ?>"><?php echo $livre['titre']; ?></option>
                <?php endforeach; ?>
            </select>
        <p>Saisir le client: </p>
        <select name="id_usager">
                <?php foreach ($usager as $usager): ?>
                    <option value="<?php echo $usager['id_usager']; ?>"><?php echo $usager['nom']; ?></option>
                <?php endforeach; ?>
            </select>
        <p>Saisir la date de l'emprunt : <input type="date" name="date_emprunt"></p>
        <p>Saisir la date de retour : <input type="date" name="date_retour"></p>
        <input type="reset" value="Annuler">
        <input type="submit" value="Valider">
        </form>  
    </center>
<?php  
include('connecte.php'); // inclure la connexion à la base de données
    $sql = "SELECT e.*, l.titre, u.nom FROM emprunt e
            INNER JOIN livre l ON e.id_livre = l.id_livre
            INNER JOIN usager u ON e.id_usager = u.id_usager";


$stmt = $conn->prepare($sql);
$stmt->execute();
$emprunts = $stmt->fetchAll();
?>
    <h1>Liste des emprunts</h1>
    <?php if (count($emprunts) > 0): ?>
        <center>
        <table>
            <tr>
                <th>Titre</th>
                <th>Client</th>
                <th>Date de l'emprunt</th>
                <th>Date du retour</th>
            </tr>
            <?php foreach ($emprunts as $emprunt): ?>
                <tr>
                    <td><?php echo $emprunt['titre']; ?></td>
                    <td><?php echo $emprunt['nom']; ?></td>
                    <td><?php echo $emprunt['date_emprunt']; ?></td>
                    <td><?php echo $emprunt['date_retour']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucun emprunt trouvé</p>
    <?php endif; ?>
    </center>
    </body>
</html>