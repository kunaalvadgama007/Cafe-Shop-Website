<?php
require '19052022.php';

$Fname = $_POST["fname"];
$Lname = $_POST['lname'];
$email = $_POST['email'];
$pw = $_POST['password'];
$ad = $_POST['address'];
$city = $_POST['city'];
$st = $_POST['state'];
$zip = $_POST['zip'];
$phnum = $_POST['phnum'];


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO `login` (Fname,Lname,Email,Phnum,pw,ad,city,st,zip) VALUES ('$Fname','$Lname','$email','$phnum','$pw','$ad','$city','$st','$zip')";
  if ($conn->query($sql) === TRUE) {
    echo "<br>";
    echo "New record created successfully";
    header('location: http://localhost/cafe_minipoject/login.html');
  }
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

?>