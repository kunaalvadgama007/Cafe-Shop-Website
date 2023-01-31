<?php
session_start();
if ($_SESSION["loggedin"]==0) {
  $_SESSION['loggedin'] = 1 ;
  header('location: http://localhost/cafe_minipoject/login.html');
  
} else {
  header('location: http://localhost/cafe_minipoject/rec.php');
}
?>