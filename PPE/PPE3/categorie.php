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
    $sql = "SELECT * FROM categorie WHERE id_categorie LIKE '%$search%' OR nom_categorie LIKE '%$search%'"; // Requête pour récupérer les livres correspondant à la recherche
} else {
    // Requête pour récupérer tous les livres
    $sql = "SELECT * FROM categorie";
}
$stmt = $conn->prepare($sql);
$stmt->execute();
$categorie = $stmt->fetchAll();

?>
<main>
    <h1>Liste des catégorie</h1>
    <form method="get">
        <label for="search">Recherche :</label>
        <input type="text" id="search" name="search" placeholder="Rechercher une categorie" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit">Rechercher</button>
    </form>
    <ul>
    <?php if (count($categorie) > 0): ?>
    <table>
        <tr>
            <th>Numéro catégorie</th>
            <th>Nom de la catégorie</th>

        </tr>
        <?php foreach ($categorie as $categorie): ?>
            <tr>
                <td><?php echo $categorie['id_categorie']; ?></td>
                <td><?php echo $categorie['nom_categorie']; ?></td>

                    
                    
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
        <?php else: ?>
            <p>Aucune catégorie trouvé</p>
        <?php endif; ?>
    </ul>
</main>
<?php include('footer.php'); ?>