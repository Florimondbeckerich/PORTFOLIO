<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styless.css">   
</head>
<body>
<?php
include('header.html');
include('connecte.php'); // inclure la connexion à la base de données
    $sql = "SELECT * FROM usager";

$stmt = $conn->prepare($sql);
$stmt->execute();
$usager = $stmt->fetchAll();
?>
<main>
    <h1>Liste des clients</h1>
    <ul>
    <?php if (count($usager) > 0): ?>
    <table>
        <tr>
        <th>Numero client</th>    
        <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>email</th>
            <th>télephone</th>
            <th>Modifier</th>
        </tr>
        <?php foreach ($usager as $usager): ?>
            <tr>
            <td><?php echo $usager['id_usager']; ?></td>    
            <td><?php echo $usager['nom']; ?></td>
                <td><?php echo $usager['prenom']; ?></td>
                <td><?php echo $usager['adresse']; ?></td>
                <td><?php echo $usager['email']; ?></td>
                <td><?php echo $usager['telephone']; ?></td>
                <form method="post" action="Modifusager.php">
     <td>
    <a href="Modifusager.php?id_usager=<?php echo $usager['id_usager']; ?>">Modifier</a>
</td>
                </from>
            
                    
            </tr>
        <?php endforeach; ?>
    </table>
        <?php else: ?>
            <p>Aucun clients trouvé</p>
        <?php endif; ?>
    </ul>
    </main>