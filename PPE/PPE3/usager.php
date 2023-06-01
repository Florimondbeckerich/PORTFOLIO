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
include('connecte.php'); // inclure la connexion à la base de données
// Vérifier si une recherche est soumise
if (isset($_GET['search']) && $_GET['search'] != '') {
    $search = htmlspecialchars($_GET['search']); // Échapper les caractères spéciaux
    $sql = "SELECT * FROM usager WHERE nom LIKE '%$search%' OR prenom LIKE '%$search%'"; // Requête pour récupérer les livres correspondant à la recherche
} else {
    // Requête pour récupérer tous les livres
    $sql = "SELECT * FROM usager";
}
$stmt = $conn->prepare($sql);
$stmt->execute();
$usager = $stmt->fetchAll();
?>
<main>
    <h1>Liste des clients</h1>
    <form method="get">
        <label for="search">Recherche :</label>
        <input type="text" id="search" name="search" placeholder="Rechercher un clients" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit">Rechercher</button>
    </form>
    <ul>
    <?php if (count($usager) > 0): ?>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>email</th>
            <th>télephone</th>
        </tr>
        <?php foreach ($usager as $usager): ?>
            <tr>
                <td><?php echo $usager['nom']; ?></td>
                <td><?php echo $usager['prenom']; ?></td>
                <td><?php echo $usager['adresse']; ?></td>
                <td><?php echo $usager['email']; ?></td>
                <td><?php echo $usager['telephone']; ?></td>
            
                    
            </tr>
        <?php endforeach; ?>
    </table>
        <?php else: ?>
            <p>Aucun clients trouvé</p>
        <?php endif; ?>
    </ul>
</main>
<?php include('footer.php'); ?>