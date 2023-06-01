<body>
<?php
include('header.html');
include('connecte.php');
$id_categorie = $_POST['id_categorie'];
$nom_categorie = $_POST['nom_categorie'];

// Préparer et exécuter la requête d'insertion
$query = "INSERT INTO categorie (id_categorie, nom_categorie) VALUES (:id_categorie, :nom_categorie)";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id_categorie', $id_categorie);
$stmt->bindParam(':nom_categorie', $nom_categorie);

try {
    $stmt->execute();
    echo 'catégorie ajoutée avec succès !';
} catch (PDOException $e) {
    echo 'Erreur lors de l\'ajout de la catégorie : ' . $e->getMessage();
}
?>
</body>
</html>
