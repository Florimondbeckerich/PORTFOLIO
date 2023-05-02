<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">   
<body>
    <center>
    <html>
        <?php
        @include("conexion.php");
        session_start();
        $a=$_POST["login"];
        $b=$_POST["motdepasse"];

        
        $req1 = "INSERT INTO user VALUES ('$a',MD5('$b'))";
        $r1 = mysqli_query($conn, $req1);

        echo "<p>L'enregistrement a effectué avec succes";

        echo "<br><a href='login.html'>Se connecter</a>";
?>
    </center>
</body>
<html>
