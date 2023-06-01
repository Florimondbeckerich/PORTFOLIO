<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="styless.css" />
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
    
        <h2>Modifier le livre</h2>
        <form method="post" action="Modiflivres.php">
            <input type="hidden" name="id_livre" value="<?php echo $livre['id_livre']; ?>">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" value="<?php echo $livre['titre']; ?>"><br>
            <label for="auteur">Auteur :</label>
            <input type="text" name="auteur" id="auteur" value="<?php echo $livre['auteur']; ?>"><br>
            <label for="annee_publication">Année de publication :</label>
            <input type="" name="annee_publication" id="annee_publication" value="<?php echo $livre['annee_publication']; ?>"><br>
            <label for="categorie">Catégorie :</label>
            <select id="categorie" name="categorie">
            <option value="">Toutes les catégories</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?php echo $categorie['id_categorie']; ?>" <?php echo isset($_GET['categorie']) && $_GET['categorie'] == $categorie['id_categorie'] ? 'selected' : ''; ?>><?php echo $categorie['nom_categorie']; ?></option>
            <?php endforeach; ?>
        </select><br>
            <label for="disponibilite">Disponibilité :</label>
            <select name="disponibilite" id="disponibilite">
                <option value="1" <?php if ($livre['disponibilite'] == 1) echo 'selected'; ?>>Disponible</option>
                <option value="0" <?php if ($livre['disponibilite'] == 0) echo 'selected'; ?>>Emprunté</option>
            </select><br>
            <input type="submit" value="Modifier">
            <td>
  

        </form>
        <?php
    } else {
        echo "Livre non trouvé.";
    }

?>


