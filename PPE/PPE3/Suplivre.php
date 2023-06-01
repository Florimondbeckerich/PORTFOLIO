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
if (isset($_GET['id_livre'])) {
    $id_livre = $_GET['id_livre'];

    // Récupérer les informations du livre depuis la base de données
    $sql = "SELECT * FROM livre WHERE id_livre = :id_livre";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_livre', $id_livre);
    $stmt->execute();
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);
    // Requête pour récupérer toutes les catégories
$sql_categ = "SELECT * FROM categorie";
$stmt_categ = $conn->prepare($sql_categ);
$stmt_categ->execute();
$categories = $stmt_categ->fetchAll();
?>
    
    <h2>Supprimer le livre</h2>
<form method="post" action="Supprlivre.php">
    <input type="hidden" name="id_livre" value="<?php echo $livre['id_livre']; ?>">
    <p>Êtes-vous sûr de vouloir supprimer le livre "<?php echo $livre['titre']; ?>" ?</p>
    <input type="submit" value="Supprimer">
</form>
        <?php
    } else {
        echo "Livre non trouvé.";
    }

?>

