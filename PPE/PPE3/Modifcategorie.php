<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css" />
  <title>Bibliotheque</title>
</head>
<body>
  <?php
  include('header.html');
  include('connecte.php');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $id_categorie = $_POST['id_categorie'];
    $nom_categorie = $_POST['nom_categorie'];

    // Effectuer la mise à jour de la catégorie dans la base de données
    $sql = "UPDATE categorie SET nom_categorie = :nom_categorie WHERE id_categorie = :id_categorie";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->bindParam(':nom_categorie', $nom_categorie);
    $stmt->execute();

    // Rediriger vers la page de liste des catégories après la modification
    header('Location: categorie.php');
    exit();
  }
  ?>
</body>
</html>