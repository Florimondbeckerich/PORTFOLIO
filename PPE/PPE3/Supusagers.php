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
    $id_usager = $_POST['id_usager'];
    
    // Préparer et exécuter la requête de suppression
    $query = "DELETE FROM usager WHERE id_usager = :id_usager";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_usager', $id_usager);
    
    try {
        $stmt->execute();
        echo 'Client supprimé avec succès !';
    } catch (PDOException $e) {
        echo 'Erreur lors de la suppression du client : ' . $e->getMessage();
    }
    ?>
  </body>
</html>
