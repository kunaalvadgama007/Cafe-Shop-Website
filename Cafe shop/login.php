<?php
require '19052022.php';
echo("<br>");
session_start();
session_name('');
$email = $_POST['email'];
$pw = $_POST['password'];


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `login` WHERE (email) = ('$email')";
$sql2 = "SELECT * FROM `login` WHERE (email)=('$email') and (pw)=('$pw')";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result) {
  if (mysqli_num_rows($result) > 0) {

    if ($result2) {
      if (mysqli_num_rows($result2) > 0) {
        echo 'Welcome!';
        $_SESSION['email']=$email;
        $_SESSION['loggedin']=1;
        header('location: http://localhost/cafe_minipoject/rec.php');
        die;
      } else {
        echo 'Incorrect password';   
        $_SESSION['loggedin']=0;
      }
    } else {
      echo 'Error: ' . $sql2 . "<br>" . $conn->error;
    }

  } else {
    echo 'Incorrect Email';
    $_SESSION['loggedin']=0;

  }
} else {
  echo 'Error: ' . $sql . "<br>" . $conn->error;
}


$conn->close();
