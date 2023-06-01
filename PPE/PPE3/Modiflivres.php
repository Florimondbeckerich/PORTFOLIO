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
        $id_livre = $_POST['id_livre'];
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $annee_publication = $_POST['annee_publication'];
        $categorie = $_POST['categorie'];
        $disponibilite = $_POST['disponibilite'];
        
        // Construction de la requête de mise à jour
        $sql = "UPDATE livre SET ";
        $params = array();
        
        // Ajout des champs à mettre à jour en fonction de leur disponibilité
        if (!empty($titre)) {
            $sql .= "titre = :titre, ";
            $params[':titre'] = $titre;
        }
        
        if (!empty($auteur)) {
            $sql .= "auteur = :auteur, ";
            $params[':auteur'] = $auteur;
        }
        
        if (!empty($annee_publication)) {
            $sql .= "annee_publication = :annee_publication, ";
            $params[':annee_publication'] = $annee_publication;
        }
        
        if (!empty($categorie)) {
            $sql .= "id_categorie = :categorie, ";
            $params[':categorie'] = $categorie;
        }
        
        if (!empty($disponibilite)) {
            $sql .= "disponibilite = :disponibilite, ";
            $params[':disponibilite'] = $disponibilite;
        }
        
        // Suppression de la virgule et de l'espace en trop à la fin de la requête
        $sql = rtrim($sql, ', ');
        
        // Ajout de la clause WHERE pour le livre spécifié
        $sql .= " WHERE id_livre = :id_livre";
        $params[':id_livre'] = $id_livre;
        
        // Préparation et exécution de la requête
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
    
        // Redirection vers la page de liste des livres après la modification
        header('Location: livre.php');
        exit();
    }
    ?>
  </body>
</html>