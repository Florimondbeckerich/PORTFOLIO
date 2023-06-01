<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="style.css" />
  <title>Bibliothèque</title>
</head>
<body>
<?php
session_start();
?>
<?php
include('header.html');  
include('connecte.php'); 
// Vérifier si l'ID du livre est passé en paramètre d'URL
if (isset($_GET['id_usager'])) {
    $id_usager = $_GET['id_usager'];

    // Récupérer les informations du livre depuis la base de données
    $sql = "SELECT * FROM usager WHERE id_usager = :id_usager";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_usager', $id_usager);
    $stmt->execute();
    $usager = $stmt->fetch(PDO::FETCH_ASSOC);
?>
    
    <h2>Supprimer le client</h2>
<form method="post" action="Supusagers.php">
    <input type="hidden" name="id_usager" value="<?php echo $usager['id_usager']; ?>">
    <p>Êtes-vous sûr de vouloir supprimer le client "<?php echo $usager['nom']; ?>" ?</p>
    <input type="submit" value="Supprimer">
</form>
        <?php
    } else {
        echo "Client non trouvé.";
    }

?>

