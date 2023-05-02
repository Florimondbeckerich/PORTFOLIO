<?php
$a=$_REQUEST['t1'];
$b=$_REQUEST['t2'];
$op=$_REQUEST['t3'];
$s=$a+$b;
$p=$a*$b;
$r=$a%$b;
$d=$a/$b;
if ($op=='+')
    echo 'Voilà la somme'. $s.'<br>';
    else if ($op=='*')
    echo 'Voilà le produit'. $p.'<br>';
    elseif ($op=='%')
    echo 'Voilà le reste'. $s.'<br>';
    elseif ($op=='/')
    echo 'Voilà la division'. $d.'<br>';
    elseif ($op=='<' or $op=='>')
    {
        if ($a<$b) echo ' est plus petit';
        else echo $a. ' a est plus grand que' .$b;
    }

?>