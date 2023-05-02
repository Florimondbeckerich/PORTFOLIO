<?php
$a=$_REQUEST['t1'];
$b=$_REQUEST['t2'];
$s=$a+$b;
$p=$a+$b;
$r=$a%$b;
$d=$a/$b;
echo 'Voilà la somme: '. $s. '<br>';
echo 'Voilà le produit: '. $p. '<br>';
echo 'Voilà le reste de la division: '. $r. '<br>';
echo 'Voilà la division: '. $d. '<br>';
?>