<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="stylesss.css" />
  <title>Bibliothèque</title>
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
    <form method="POST" action="Ajtretours.php">
    <p>Saisir le numéro de l'emprunt: <input type="hiden" name="id_emprunt"></p>
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
                <th>Numéro de l'emprunt</th>
                <th>Titre</th>
                <th>Client</th>
                <th>Date de l'emprunt</th>
                <th>Date du retour</th>
            </tr>
            <?php foreach ($emprunts as $emprunt): ?>
                <tr>
                <td><?php echo $emprunt['id_emprunt']; ?></td>    
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
    <?php
include('connecte.php'); // inclure la connexion à la base de données

// Vérifier si une recherche est soumise

    // Requête pour récupérer tous les retours avec les informations de livre et usager
    $sql = "SELECT r.*, l.titre, u.nom FROM retour r
            INNER JOIN emprunt e ON r.id_emprunt = e.id_emprunt
            INNER JOIN livre l ON e.id_livre = l.id_livre
            INNER JOIN usager u ON e.id_usager = u.id_usager";


$stmt = $conn->prepare($sql);
$stmt->execute();
$retours = $stmt->fetchAll();
?>

    <h1>Liste des retours</h1>
    <?php if (count($retours) > 0): ?>
        <table>
            <tr>
                <th>Titre</th>
                <th>Client</th>
                <th>Date de l'emprunt</th>
                <th>Date du retour</th>

            </tr>
            <?php foreach ($retours as $retour): ?>
                <tr>
                    <td><?php echo $retour['titre']; ?></td>
                    <td><?php echo $retour['nom']; ?></td>
                    <td><?php echo $retour['date_emprunt']; ?></td>
                    <td><?php echo $retour['date_retour']; ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucun retour trouvé</p>
    <?php endif; ?>
