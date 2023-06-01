<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="stylessss.css">   
<body>
    <center>
    <html>
        <?php
        @include("connecte.php");
        $a = $_POST['login'];
        $b = $_POST['motdepasse'];

        
        $query = "INSERT INTO user VALUES (:login, :motdepasse)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':login', $a);
        $stmt->bindParam(':motdepasse', $b);
        $stmt->execute();

        echo "<p>L'enregistrement a été effectué avec succès.</p>";

        echo "<br><a href='index.html'>Se connecter</a>";
        ?>
    </center>
</body>
<html>