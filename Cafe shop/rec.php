<?php
session_start();
$email = 0;
$conn = mysqli_connect("localhost", "", "", "");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "SELECT * FROM `login` WHERE email='$email'";
if (isset($_SESSION['email'])) {
  echo "Your session is running " . $_SESSION['email'];
  $email = $_SESSION['email'];

  $sql = "SELECT * FROM `login` WHERE email='$email'";
} else {
  $sql = "SELECT * FROM `login` WHERE email=''";
}

$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
  <link href="mp.css" rel="stylesheet" />
  <title>Document</title>
</head>

<body>
  <header class="head">
    <nav class="navbar navbar-expand-lg bg-black">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.html" style="color: rgb(147, 99, 64);
              padding: 0px 30px;
              font-size: xx-large;
            ">Payment</a>
      </div>
    </nav>
    <header class="head">
      <nav class="navbar navbar-expand-lg bg-black">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="color: rgb(147, 99, 64); padding: 0px 30px;"><img src="KMV_CAFE.png" alt="logo" style="height: 70px; ;width: 80px ;"> KMV Cafe</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.html" style="color: rgb(147, 99, 64); padding: 0px 30px;">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aboutus.html" style="color: rgb(147, 99, 64); padding: 0px 30px;">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactus.html" style="color: rgb(147, 99, 64); padding: 0px 30px;">Contact Us</a>
              </li>
            </ul>
            <div class="d-flex" role="search" style="padding:0px 5px 0px 200px ;">
              <button class="btn" type="submit"><a href="login.html" class="code">Login</a></button>
            </div>
          </div>
        </div>
      </nav>
    </header>
  </header>
  <br />
  <div class="dets">
    <a class="btn">Customer Details</a>

    <section>
      <br>
      <style>
        table {
          margin: 0 auto;
          font-size: large;
          border: 1px solid black;
        }

        h1 {
          text-align: center;
          color: rgb(147, 99, 64);
          font-size: xx-large;
          font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
          background-color: #E4F5D4;
          border: 1px solid black;
        }

        th,
        td {
          
          font-weight: bold;
          border: 1px solid black;
          padding: 10px;
          text-align: center;
        }

        td {
          font-weight: lighter;
        }
      </style>
      <table class="table" id="table">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Phone No.</th>
          <th>Address</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_row($result)) {
        ?>
          <tr>
            <td><?php echo $row['1']." ".$row['2']; ?></td>
            <td><?php echo $row['3']; ?></td>
            <td><?php echo $row['4']; ?></td>
            <td><?php echo $row['6']; ?></td>
          </tr>
        <?php
        };
        ?>
    </section>
    </table>
    <div>
      <div class="btn col">Order list</div>
      <p class="container display-inline">
      <p style="display: inline;">American Latte: </p><button class="btn col-1" value="250" onclick="price(250)">
        price 250
      </button>
      </p>
      
      <p class="col-5 display-inline">
      <p style="display: inline;">Cappuccino: </p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn col-1" value="250" onclick="price(300)">
        price 300
      </button>
      </p>
      
      <p class="col-4 display-inline">
      <p style="display: inline;">Frappe: </p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn col-1" value="250" onclick="price(450)">
        price 450
      </button>
      </p>
      
      <br /><br />
      <label>Tax amount: +5%</label>
      <br />
      <button class="btn" onclick="ans()">Total</button>&nbsp;<button class="btn" onclick="cls()">Clear</button>
      <br />
      <label>Total amount:
        <form  class="form" action="paymentsql.php" method="post">
          <input type="text" name="cal" id="cal"></input>
        </form>
      </label>
    </div>
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn" onclick="myFunction()">
    <a href="pay.php" class="code">Proceed to Payment</a>
  </button>
  <button class="btn" onclick="prin()">Print Reciept</button>

  <script>
    var dis = document.getElementById("cal");

    function price(inp) {
      dis.value = dis.value + inp + "+";
    }
    
    function ans() {
      let x = dis.value + "0";
      let y = eval(x);
      dis.value = 1.05 * y;
    }

    function cls() {
      dis.value = "";
    }

    function myFunction() {
      alert("Sure you want to proceed to Payment?");
    }

    function prin() {
      window.print();

    }
  </script>
  <br>
  <br>
    
    
</body>

</html>