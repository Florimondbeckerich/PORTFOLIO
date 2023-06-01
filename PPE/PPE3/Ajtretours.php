<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="stylesss.css" />
    <title>Bibliotheque</title>
  </head>
  <body>
    
    <?php
    include('header.html');  
    include('connecte.php');
    $id_emprunt = $_POST['id_emprunt'];
    $id_livre = $_POST['id_livre'];
    $id_usager = $_POST['id_usager'];
    $date_emprunt = $_POST['date_emprunt'];
    $date_retour = $_POST['date_retour'];
        // Préparer et exécuter la requête d'insertion
    $query = "INSERT INTO retour (id_emprunt, id_livre, id_usager, date_emprunt, date_retour) VALUES (:id_emprunt, :id_livre, :id_usager, :date_emprunt, :date_retour)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_emprunt', $id_emprunt);
    $stmt->bindParam(':id_livre', $id_livre);
    $stmt->bindParam(':id_usager', $id_usager);
    $stmt->bindParam(':date_emprunt', $date_emprunt);
    $stmt->bindParam(':date_retour', $date_retour);
    
    try {
        $stmt->execute();
        echo 'retour ajouté avec succès !';
    } catch (PDOException $e) {
        echo 'Erreur lors de l\'ajout du retour : ' . $e->getMessage();
    }
    ?>
  </body>
</html>
