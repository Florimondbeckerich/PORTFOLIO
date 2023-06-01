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

    // Requête pour récupérer tous les retours avec les informations de livre et usager
    $sql = "SELECT r.*, l.titre, u.nom FROM retour r
            INNER JOIN emprunt e ON r.id_emprunt = e.id_emprunt
            INNER JOIN livre l ON e.id_livre = l.id_livre
            INNER JOIN usager u ON e.id_usager = u.id_usager";


$stmt = $conn->prepare($sql);
$stmt->execute();
$retours = $stmt->fetchAll();
?>

    <h1>Liste des retours</h1>
    <?php if (count($retours) > 0): ?>
        <table>
            <tr>
                <th>Titre</th>
                <th>Client</th>
                <th>Date de l'emprunt</th>
                <th>Date du retour</th>
                <th>Modifier</th>

            </tr>
            <?php foreach ($retours as $retour): ?>
                <tr>
                    <td><?php echo $retour['titre']; ?></td>
                    <td><?php echo $retour['nom']; ?></td>
                    <td><?php echo $retour['date_emprunt']; ?></td>
                    <td><?php echo $retour['date_retour']; ?></td>
                    <form method="post" action="Modifretour.php">
     <td>
    <a href="Modifretour.php?id_retour=<?php echo $retour['id_retour']; ?>">Modifier</a>
</td>
                </from>

                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucun retour trouvé</p>
    <?php endif; ?>
