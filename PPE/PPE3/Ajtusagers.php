<html>
<body>
<?php
include('header.html');
include('connecte.php');
$id_usager = $_POST['id_usager'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];

// Préparer et exécuter la requête d'insertion
$query = "INSERT INTO usager (id_usager, nom, prenom, adresse, email, telephone) VALUES (:id_usager, :nom, :prenom, :adresse, :email, :telephone)";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id_usager', $id_usager);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':adresse', $adresse);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':telephone', $telephone);



try {
    $stmt->execute();
    echo 'client ajoutée avec succès !';
} catch (PDOException $e) {
    echo 'Erreur lors de l\'ajout de la client : ' . $e->getMessage();
}
?>
</body>
</html>
