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
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $id_categorie = $_POST['id_categorie'];
    $annee_publication = $_POST['annee_publication'];
    $disponibilite = isset($_POST['disponibilite']) ? $_POST['disponibilite'] : '1';




    
    // Préparer et exécuter la requête d'insertion
    $query = "INSERT INTO livre (id_livre, titre, auteur, id_categorie, annee_publication, disponibilite) VALUES (:id_livre, :titre, :auteur, :id_categorie, :annee_publication, :disponibilite)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_livre', $id_livre);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':auteur', $auteur);
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->bindParam(':annee_publication', $annee_publication);
    $stmt->bindParam(':disponibilite', $disponibilite);
    
    try {
        $stmt->execute();
        echo 'Livre ajouté avec succès !';
    } catch (PDOException $e) {
        echo 'Erreur lors de l\'ajout du livre : ' . $e->getMessage();
    }
    ?>
  </body>
</html>
