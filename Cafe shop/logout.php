<?php
$_SESSION['loggedin']=0;
session_unset();
session_destroy();
header('location: http://localhost/cafe_minipoject/home.html');
?>