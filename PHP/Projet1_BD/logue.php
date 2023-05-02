<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">   

<?php
    
    
    
    session_start();
    session_unset();
    session_destroy();

    header('location:login.html');

?>