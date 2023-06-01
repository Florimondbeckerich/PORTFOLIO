<body>
    <html>
        <?php
        @include("connecte.php");
        $a = $_POST["login"];
        $b = $_POST["motdepasse"];
        
        $query = "SELECT * FROM user WHERE login = :login AND motdepasse = :motdepasse";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':login', $a);
        $stmt->bindParam(':motdepasse', $b);
        $stmt->execute();
        
        $ligne = $stmt->rowCount();
        
        if ($ligne == 1)
            header("location: menu.html");
        else
            header("location: userfail.html");
        ?>
</body>
<html>
