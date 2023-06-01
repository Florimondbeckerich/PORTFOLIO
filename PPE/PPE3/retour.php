<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="stylesss.css" />
  <title>Bibliothèque</title>
</head>
<body>
<?php
session_start();
?>
<?php
include('header.html');
include('connecte.php'); // inclure la connexion à la base de données

// Vérifier si une recherche est soumise
if (isset($_GET['search']) && $_GET['search'] != '') {
    $search = htmlspecialchars($_GET['search']); // Échapper les caractères spéciaux

    // Requête pour récupérer les retours correspondant à la recherche basée sur le titre du livre et le nom du client
    $sql = "SELECT r.*, l.titre, u.nom FROM retour r
            INNER JOIN emprunt e ON r.id_emprunt = e.id_emprunt
            INNER JOIN livre l ON e.id_livre = l.id_livre
            INNER JOIN usager u ON e.id_usager = u.id_usager
            WHERE l.titre LIKE '%$search%' OR u.nom LIKE '%$search%'";
} else {
    // Requête pour récupérer tous les retours avec les informations de livre et usager
    $sql = "SELECT r.*, l.titre, u.nom FROM retour r
            INNER JOIN emprunt e ON r.id_emprunt = e.id_emprunt
            INNER JOIN livre l ON e.id_livre = l.id_livre
            INNER JOIN usager u ON e.id_usager = u.id_usager";
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$retours = $stmt->fetchAll();
?>
<main>
    <h1>Liste des retours</h1>
    <form method="get">
        <label for="search">Recherche :</label>
        <input type="text" id="search" name="search" placeholder="Rechercher un retour" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit">Rechercher</button>
    </form>
    <?php if (count($retours) > 0): ?>
        <table>
            <tr>
                <th>Titre</th>
                <th>Client</th>
                <th>Date de l'emprunt</th>
                <th>Date du retour</th>

            </tr>
            <?php foreach ($retours as $retour): ?>
                <tr>
                    <td><?php echo $retour['titre']; ?></td>
                    <td><?php echo $retour['nom']; ?></td>
                    <td><?php echo $retour['date_emprunt']; ?></td>
                    <td><?php echo $retour['date_retour']; ?></td>

                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucun retour trouvé</p>
    <?php endif; ?>
</main>
<?php include('footer.php'); ?>