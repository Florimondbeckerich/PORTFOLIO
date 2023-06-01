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

if (isset($_GET['id_categorie'])) {
    $id_categorie = $_GET['id_categorie'];

    // Récupérer les informations de la catégorie depuis la base de données
    $sql = "SELECT * FROM categorie WHERE id_categorie = :id_categorie";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->execute();
    $categorie = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupérer toutes les catégories
    $sql_categories = "SELECT * FROM categorie";
    $stmt_categories = $conn->prepare($sql_categories);
    $stmt_categories->execute();
    $categories = $stmt_categories->fetchAll(PDO::FETCH_ASSOC);
?>
    <h2>Modifier la catégorie</h2>
    <form method="post" action="Modifcategorie.php">
        <input type="hidden" name="id_categorie" value="<?php echo $categorie['id_categorie']; ?>">
        <label for="nom_categorie">Catégorie :</label>
      <input type="text" id="nom_categorie" name="nom_categorie" value="<?php echo $categorie['nom_categorie']; ?>"><br>
        <input type="submit" value="Modifier">
    </form>
<?php
} else {
    echo "Erreur : Aucune catégorie sélectionnée.";
}
?>
</body>
</html>