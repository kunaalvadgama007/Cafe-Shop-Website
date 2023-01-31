<?php
require '19052022.php';
session_start();


$ct = $_POST['card_type'];
$cn = $_POST['card_number'];
$ed = $_POST['exp_date'];
$cvv = $_POST['cvv'];
$hn = $_POST['h_name'];

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO `payment` (card_type,card_number,expdt,cvv,h_name) VALUES ('$ct','$cn','$ed','$cvv','$hn')
  ";

  if ($conn->query($sql) === TRUE) {
    echo "<br>";
    echo "Payment successful!";
    echo '<script>alert("Payment successful!");</script>';
    header('location: http://localhost/cafe_minipoject/home.html');
  }
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>