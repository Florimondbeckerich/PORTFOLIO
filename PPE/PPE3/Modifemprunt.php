<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="styles.css" />
  <title>Bibliothèque</title>
</head>
<body>
<?php
session_start();
?>
<?php
include('header.html');
include('connecte.php');

if (isset($_GET['id_emprunt'])) {
    $id_emprunt = $_GET['id_emprunt'];

    // Récupérer les informations de l'emprunt depuis la base de données
    $sql = "SELECT * FROM emprunt WHERE id_emprunt = :id_emprunt";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_emprunt', $id_emprunt);
    $stmt->execute();
    $emprunt = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql_livre = "SELECT * FROM livre";
    $stmt_livre = $conn->prepare($sql_livre);
    $stmt_livre->execute();
    $livre = $stmt_livre->fetchAll();

    $sql_usager = "SELECT * FROM usager";
    $stmt_usager = $conn->prepare($sql_usager);
    $stmt_usager->execute();
    $usager = $stmt_usager->fetchAll();

    // Vérifier si un emprunt a été trouvé
    if ($emprunt) {
        // Afficher le formulaire de modification avec les informations de l'emprunt
?>
        <h2>Modifier l'emprunt</h2>
        <form method="post" action="Modifemprunts.php">
            <input type="hidden" name="id_emprunt" value="<?php echo $emprunt['id_emprunt']; ?>">
            <p>Saisir le titre: </p>
            <select name="id_livre">
                <?php foreach ($livre as $livreItem): ?>
                    <option value="<?php echo $livreItem['id_livre']; ?>" <?php if ($emprunt['id_livre'] == $livreItem['id_livre']) echo 'selected'; ?>><?php echo $livreItem['titre']; ?></option>
                <?php endforeach; ?>
            </select>
            <p>Saisir le client: </p>
            <select name="id_usager">
                <?php foreach ($usager as $usagerItem): ?>
                    <option value="<?php echo $usagerItem['id_usager']; ?>" <?php if ($emprunt['id_usager'] == $usagerItem['id_usager']) echo 'selected'; ?>><?php echo $usagerItem['nom']; ?></option>
                <?php endforeach; ?>
            </select>
            <p>Saisir la date de l'emprunt : <input type="date" name="date_emprunt" value="<?php echo $emprunt['date_emprunt']; ?>"></p>
            <p>Saisir la date de retour : <input type="date" name="date_retour" value="<?php echo $emprunt['date_retour']; ?>"></p>
            <input type="submit" value="Modifier">
        </form>
<?php
    } else {
        echo "Erreur : Emprunt introuvable.";
    }
} else {
    echo "Erreur : Aucun emprunt sélectionné.";
}
?>