<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styless.css">   
</head>
<body>
    <?php
    include('header.html');
include('connecte.php');
$sql = "SELECT * FROM categorie";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();

?>

<main>
    <h1>Liste des catégories</h1>
    <?php if (count($categories) > 0): ?>
        <table>
            <tr>
                <th>Numéro catégorie</th>
                <th>Nom de la catégorie</th>
                <th>Modifier</th>
            </tr>
            <?php foreach ($categories as $categorie): ?>
                <tr>
                    <td><?php echo $categorie['id_categorie']; ?></td>
                    <td><?php echo $categorie['nom_categorie']; ?></td>
                    <form method="post" action="Modifcategori.php">
     <td>
    <a href="Modifcategori.php?id_categorie=<?php echo $categorie['id_categorie']; ?>">Modifier</a>
</td>
                </from>
                </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucune catégorie trouvée</p>
    <?php endif; ?>
</main>
</body>
</html>
