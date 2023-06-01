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
    <form method="get">
        <label for="search">Recherche :</label>
        <input type="text" id="search" name="search" placeholder="Rechercher un livre" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie">
            <option value="">Toutes les catégories</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?php echo $categorie['id_categorie']; ?>" <?php echo isset($_GET['categorie']) && $_GET['categorie'] == $categorie['id_categorie'] ? 'selected' : ''; ?>><?php echo $categorie['nom_categorie']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Rechercher</button>
    </form>
    <ul>
    <?php if (count($livres) > 0): ?>
    <table>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Année de publication</th>
            <th>Catégorie</th>
            <th>Disponibilité</th>
        </tr>
        <?php foreach ($livres as $livre): ?>
            <tr>
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
<?php include('footer.php'); ?>