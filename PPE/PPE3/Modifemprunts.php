<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="styless.css" />
    <title>Bibliotheque</title>
  </head>
  <body>
    <?php
    include('header.html');  
    include('connecte.php');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $id_emprunt = $_POST['id_emprunt'];
        $id_livre = $_POST['id_livre'];
        $id_usager = $_POST['id_usager'];
        $date_emprunt = $_POST['date_emprunt'];
        $date_retour = $_POST['date_retour'];
    
        // Construction de la requête de mise à jour
        $sql = "UPDATE emprunt SET ";
        $params = array();
    
        // Ajout des champs à mettre à jour en fonction de leur disponibilité
        if (!empty($id_livre)) {
            $sql .= "id_livre = :id_livre, ";
            $params[':id_livre'] = $id_livre;
        }
    
        if (!empty($id_usager)) {
            $sql .= "id_usager = :id_usager, ";
            $params[':id_usager'] = $id_usager;
        }
    
        if (!empty($date_emprunt)) {
            $sql .= "date_emprunt = :date_emprunt, ";
            $params[':date_emprunt'] = $date_emprunt;
        }
    
        if (!empty($date_retour)) {
            $sql .= "date_retour = :date_retour, ";
            $params[':date_retour'] = $date_retour;
        }
    
        // Suppression de la virgule et de l'espace en trop à la fin de la requête
        $sql = rtrim($sql, ', ');
    
        // Ajout de la clause WHERE pour l'emprunt spécifié
        $sql .= " WHERE id_emprunt = :id_emprunt";
        $params[':id_emprunt'] = $id_emprunt;
    
        // Préparation et exécution de la requête
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
    
        // Redirection vers la page de liste des livres après la modification
        header('Location: emprunt.php');
        exit();
    }
    ?>
  </body>
</html>