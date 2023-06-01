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
    $sql = "SELECT e.*, l.titre, u.nom FROM emprunt e
            INNER JOIN livre l ON e.id_livre = l.id_livre
            INNER JOIN usager u ON e.id_usager = u.id_usager";


$stmt = $conn->prepare($sql);
$stmt->execute();
$emprunt = $stmt->fetchAll();
?>
    <h1>Liste des emprunts</h1>
    <?php if (count($emprunt) > 0): ?>
        <center>
        <table>
            <tr>
                <th>Titre</th>
                <th>Client</th>
                <th>Date de l'emprunt</th>
                <th>Date du retour</th>
                <th>Modifier</th>
            </tr>
            <?php foreach ($emprunt as $emprunt): ?>
                <tr>
                    <td><?php echo $emprunt['titre']; ?></td>
                    <td><?php echo $emprunt['nom']; ?></td>
                    <td><?php echo $emprunt['date_emprunt']; ?></td>
                    <td><?php echo $emprunt['date_retour']; ?></td>
                    <form method="post" action="Modifemprunt.php">
     <td>
    <a href="Modifemprunt.php?id_emprunt=<?php echo $emprunt['id_emprunt']; ?>">Modifier</a>
</td>
                </from>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucun emprunt trouvé</p>
    <?php endif; ?>
    </center>
    </body>
</html>