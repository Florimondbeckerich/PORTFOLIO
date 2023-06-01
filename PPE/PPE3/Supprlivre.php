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
    $id_livre = $_POST['id_livre'];
    
    // Préparer et exécuter la requête de suppression
    $query = "DELETE FROM livre WHERE id_livre = :id_livre";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_livre', $id_livre);
    
    try {
        $stmt->execute();
        echo 'Livre supprimé avec succès !';
    } catch (PDOException $e) {
        echo 'Erreur lors de la suppression du livre : ' . $e->getMessage();
    }
    ?>
  </body>
</html>
