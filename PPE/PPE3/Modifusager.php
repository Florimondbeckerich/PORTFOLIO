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

if (isset($_GET['id_usager'])) {
    $id_usager = $_GET['id_usager'];

    // Récupérer les informations de l'usager depuis la base de données
    $sql = "SELECT * FROM usager WHERE id_usager = :id_usager";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_usager', $id_usager);
    $stmt->execute();
    $usager_info = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupérer tous les usagers
    $sql_usager = "SELECT * FROM usager";
    $stmt_usager = $conn->prepare($sql_usager);
    $stmt_usager->execute();
    $usagers = $stmt_usager->fetchAll(PDO::FETCH_ASSOC);
?>
    <h2>Modifier le client</h2>
    <form method="post" action="Modifusagers.php">
        <input type="hidden" name="id_usager" value="<?php echo $usager_info['id_usager']; ?>">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $usager_info['nom']; ?>"><br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $usager_info['prenom']; ?>"><br>
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" value="<?php echo $usager_info['adresse']; ?>"><br>
        <label for="email">Email :</label>
        <input type="text" id="email" name="email" value="<?php echo $usager_info['email']; ?>"><br>
        <label for="telephone">Téléphone :</label>
        <input type="text" id="telephone" name="telephone" value="<?php echo $usager_info['telephone']; ?>"><br>
        <input type="submit" value="Modifier">
    </form>
<?php
} else {
    echo "Erreur : Aucun client sélectionné.";
}
?>

</body>
</html>