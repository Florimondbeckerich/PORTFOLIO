<meta charset="utf-8">
<?php
mysql_connect ("localhost","root", "");
mysql_select_db("scolarite");
$a = $_POST["Num"];
$b = $_POST["Nom"];
$c = $_POST["Numtel"];
$d = $_POST["adresse"];

$req1 = "INSERT INTO eleves VALUES ('$a','$b','$c','$d')";
$r1= mysql_query($req1);

echo "<p>L'enregristrement a effectué</p>";

mysql_close()
?>