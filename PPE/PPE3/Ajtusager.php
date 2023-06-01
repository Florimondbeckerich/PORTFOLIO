<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">   
</head>
<body>
    <?php
    include('header.html');  
    ?>
    <center>
    <form method="POST" action="Ajtusagers.php">
        <p>Saisir le numero du client: <input type="text" name="id_usager"></p>
        <p>Saisir le nom : <input type="text" name="nom"></p>
        <p>Saisir le prénom : <input type="text" name="prenom"></p>
        <p>Saisir l'adresse : <input type="text" name="adresse"></p>
        <p>Saisir l'email : <input type="text" name="email"></p>
        <p>Saisir le numéro de télephone : <input type="text" name="telephone"></p>
        <input type="reset" value="Annuler">
        <input type="submit" value="Valider">
<?php
include('connecte.php'); // inclure la connexion à la base de données
    $sql = "SELECT * FROM usager";

$stmt = $conn->prepare($sql);
$stmt->execute();
$usager = $stmt->fetchAll();
?>
<main>
    <h1>Liste des clients</h1>
    <ul>
    <?php if (count($usager) > 0): ?>
    <table>
        <tr>
        <th>Numero client</th>    
        <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse</th>
            <th>email</th>
            <th>télephone</th>
        </tr>
        <?php foreach ($usager as $usager): ?>
            <tr>
            <td><?php echo $usager['id_usager']; ?></td>    
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
    </form>  
    </center>
 </body>
 </html>