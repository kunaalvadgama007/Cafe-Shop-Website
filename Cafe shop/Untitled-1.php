<?php
$conn = mysqli_connect("localhost","","","");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT * FROM `login` WHERE email='veditbeladia@gmail.com'";

$result = $conn->query($sql);
if ($result==true) {
  echo "connected";
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
    echo ("\n". $row['6']);
  }
  mysqli_free_result($result);
}

$conn->close();
?>

<?php
$conn = mysqli_connect("localhost","","","");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT * FROM `login` WHERE email=''";

$result = $conn->query($sql);
if ($result==true) {
  echo "connected";
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
    echo ("\n". $row['6']);
    echo $row['1'].$row['3'];
    header('location: https://docs.google.com/document/d/13Rw61JBEwr2ZbJ_SY-2lUFNnqavDgKMDxXnake0M-i8/edit#heading=h.v7x2grtt3hpz');
  }
  mysqli_free_result($result);
}

$conn->close();
?>