<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Bibliothèque</title>
  </head>
  <body>
    
    <?php
    include('header.html'); // Assurez-vous que le fichier "header.html" existe et est correctement inclus.
    include('connecte.php'); // Assurez-vous que le fichier "connecte.php" existe et contient la logique de connexion à votre base de données.
    
    // Vérifier si l'ID de catégorie est présent dans la requête POST
    if (isset($_POST['id_categorie'])) {
        $id_categorie = $_POST['id_categorie'];
        
        // Préparer et exécuter la requête de suppression
        $query = "DELETE FROM categorie WHERE id_categorie = :id_categorie";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_categorie', $id_categorie);
        
        try {
            $stmt->execute();
            echo 'Catégorie supprimée avec succès !';
        } catch (PDOException $e) {
            echo 'Erreur lors de la suppression de la catégorie : ' . $e->getMessage();
        }
    } else {
        echo 'ID de catégorie manquant dans la requête.';
    }
    ?>
  </body>
</html>