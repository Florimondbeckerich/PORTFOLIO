<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css" />
  <title>Bibliothèque</title>
</head>
<body>
<?php
session_start();
?>
<?php
include('header.html');  
include('connecte.php'); // Assurez-vous que le chemin d'accès à ce fichier est correct

// Vérifier si l'ID de la categorie est passé en paramètre d'URL
if (isset($_GET['id_categorie'])) {
    $id_categorie = $_GET['id_categorie'];

    // Récupérer les informations de la categorie depuis la base de données
    $sql = "SELECT * FROM categorie WHERE id_categorie = :id_categorie"; // Correction de la faute de frappe
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->execute();
    $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    
    <h2>Supprimer la categorie</h2>
    <form method="post" action="Supcategorie.php">
        <input type="hidden" name="id_categorie" value="<?php echo $categorie['id_categorie']; ?>">
        <p>Êtes-vous sûr de vouloir supprimer la categorie "<?php echo $categorie['nom_categorie']; ?>" ?</p>
        <input type="submit" value="Supprimer">
    </form>
<?php
} else {
    echo "Categorie non trouvée.";
}
?>
</body>
</html>