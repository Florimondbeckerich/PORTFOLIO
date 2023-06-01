<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="styless.css" />
  <title>Bibliothèque</title>
</head>
<body>
<?php
session_start();
?>
<?php
include('header.html');  
include('connecte.php'); 
$sql = "SELECT * FROM livre";
$stmt = $conn->prepare($sql);
$stmt->execute();
$livres = $stmt->fetchAll();
// Requête pour récupérer les noms des catégories des livres
$sql_categ_names = "SELECT id_categorie, nom_categorie FROM categorie";
$stmt_categ_names = $conn->prepare($sql_categ_names);
$stmt_categ_names->execute();
$categ_names = $stmt_categ_names->fetchAll(PDO::FETCH_KEY_PAIR);

?>
<main>
    <h1>Liste des livres</h1>
    
    <ul>
    <?php if (count($livres) > 0): ?>
    <table>
        <tr>
            <th>Numéro du livre</th>   
            <th>Titre</th>
            <th>Auteur</th>
            <th>Année de publication</th>
            <th>Catégorie</th>
            <th>Disponibilité</th>
            <th>Modifier</th>
        </tr>
        <?php foreach ($livres as $livre): ?>
            <tr>
                <td><?php echo $livre['id_livre']; ?></td>    
                <td><?php echo $livre['titre']; ?></td>
                <td><?php echo $livre['auteur']; ?></td>
                <td><?php echo $livre['annee_publication']; ?></td>
                <td><?php echo $categ_names[$livre['id_categorie']]; ?></td>
                <td>
                    <?php if ($livre['disponibilite'] == 1): ?>
                        Disponible
                    <?php else: ?>
                        Emprunté
                    <?php endif; ?>
                    <form method="post" action="Modiflivre.php">
     <td>
    <a href="Modiflivre.php?id_livre=<?php echo $livre['id_livre']; ?>">Modifier</a>
</td>
                </from>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
        <?php else: ?>
            <p>Aucun livre trouvé</p>
        <?php endif; ?>
    </ul>
</main>
<?php include('footer.php'); ?>

