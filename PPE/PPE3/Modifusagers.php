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
        $id_usager = $_POST['id_usager'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        
        // Construction de la requête de mise à jour
        $sql = "UPDATE usager SET ";
        $params = array();
        
        // Ajout des champs à mettre à jour en fonction de leur disponibilité
        if (!empty($nom)) {
            $sql .= "nom = :nom, ";
            $params[':nom'] = $nom;
        }
        
        if (!empty($prenom)) {
            $sql .= "prenom = :prenom, ";
            $params[':prenom'] = $prenom;
        }
        
        if (!empty($adresse)) {
            $sql .= "adresse = :adresse, ";
            $params[':adresse'] = $adresse;
        }
        
        if (!empty($email)) {
            $sql .= "email = :email, ";
            $params[':email'] = $email;
        }
        
        if (!empty($telephone)) {
            $sql .= "telephone = :telephone, ";
            $params[':telephone'] = $telephone;
        }
        
        // Suppression de la virgule et de l'espace en trop à la fin de la requête
        $sql = rtrim($sql, ', ');
        
        // Ajout de la clause WHERE pour le livre spécifié
        $sql .= " WHERE id_usager = :id_usager";
        $params[':id_usager'] = $id_usager;
        
        // Préparation et exécution de la requête
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
    
        // Redirection vers la page de liste des livres après la modification
        header('Location: usager.php');
        exit();
    }
    ?>
  </body>
</html>