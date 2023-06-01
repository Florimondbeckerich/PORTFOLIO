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
        // Requête pour récupérer toutes les catégories
$sql_categ = "SELECT * FROM categorie";
$stmt_categ = $conn->prepare($sql_categ);
$stmt_categ->execute();
$categories = $stmt_categ->fetchAll();
?>
    <center>
    <form method="POST" action="Ajtlivres.php">
    <p>Saisir le numéro du livre : <input type="text" name="id_livre"></p>
            <p>Saisir le titre : <input type="text" name="titre"></p>
            <p>Saisir l'auteur : <input type="text" name="auteur"></p>
            <p>Saisir la catégorie :</p>
            <select name="id_categorie">
                <?php foreach ($categories as $categorie): ?>
                    <option value="<?php echo $categorie['id_categorie']; ?>"><?php echo $categorie['nom_categorie']; ?></option>
                <?php endforeach; ?>
            </select>
            <p>Saisir l'année de publication : <input type="number" name="annee_publication"></p>
            <input type="reset" value="Annuler">
            <input type="submit" value="Valider">
    <?php
include('connecte.php'); // inclure la connexion à la base de données
// Vérifier si une recherche est soumise
if (isset($_GET['search']) && $_GET['search'] != '') {
    $search = htmlspecialchars($_GET['search']); // Échapper les caractères spéciaux
    $sql = "SELECT * FROM livre WHERE titre LIKE '%$search%' OR auteur LIKE '%$search%'"; // Requête pour récupérer les livres correspondant à la recherche
} else {
    // Requête pour récupérer tous les livres
    $sql = "SELECT * FROM livre";
}
$stmt = $conn->prepare($sql);
$stmt->execute();
$livres = $stmt->fetchAll();
// Requête pour récupérer toutes les catégories
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
                    
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
        <?php else: ?>
            <p>Aucun livre trouvé</p>
        <?php endif; ?>
    </ul>
</main>
</form>  
    </center>
</body>
</html>


