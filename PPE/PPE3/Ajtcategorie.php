<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styless.css">   
</head>
<body>
    <?php
    include('header.html');  
    ?>
    <center>
    <form method="POST" action="Ajtcategories.php">
        <p>Saisir le numero de la catégorie: <input type="text" name="id_categorie"></p>
        <p>Saisir le nom de la catégorie : <input type="text" name="nom_categorie"></p>
        <input type="reset" value="Annuler">
        <input type="submit" value="Valider">
        </form>  
    </center>
        <?php
include('connecte.php');
$sql = "SELECT * FROM categorie";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();

?>

<main>
    <h1>Liste des catégories</h1>
    <?php if (count($categories) > 0): ?>
        <table>
            <tr>
                <th>Numéro catégorie</th>
                <th>Nom de la catégorie</th>
            </tr>
            <?php foreach ($categories as $categorie): ?>
                <tr>
                    <td><?php echo $categorie['id_categorie']; ?></td>
                    <td><?php echo $categorie['nom_categorie']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Aucune catégorie trouvée</p>
    <?php endif; ?>
</main>
</body>
</html>
