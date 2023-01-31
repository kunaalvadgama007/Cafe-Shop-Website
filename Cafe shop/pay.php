<?php
session_start();
$_SESSION['amount'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Payment Form</title>
    <style>
      * {
        box-sizing: content-box;
      }
      body {
        background: linear-gradient(rgba(0, 0, 0, 0.514), rgba(0, 0, 0, 0.356)),
          url(cafe.jpg);
        background-size: cover;
        background-position: center;
        margin: 25px 30px;
        font-size: 17px;
        padding: 8px;
        font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande",
          "Lucida Sans", Arial, sans-serif;
      }
      .container {
        background-color: rgba(255, 255, 255, 0.781);
        padding: 5px 20px 15px 20px;
        border-radius: 15px;
      }
      input[type="number"],
      input[type="password"],
      input[type="date"],
      input[type="text"],
      select,
      textarea {
        width: 90%;
        padding: 12px;
        border: 1px solid black;
        border-radius: 5px;
        margin: 10px;
      }

      .main_heading {
        text-align: center;
        font-family: "Times New Roman", Times, serif;
        font-size: 45px;
      }
      input[type="submit"] {
        background-color: black;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 90%;
      }
      input[type="submit"]:hover {
        background-color: rgb(33, 14, 85);
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <form class="container-fluid" action="paymentsql.php" method="post">
        <h1 class="main_heading">Payment</h1>
        <hr />
        <p>
          Card Type:
          <img src="Mastercard_logo.jpg" alt="Mastercard" width="30" />
          <img src="Visa-Logo.png" alt="VISA" width="30" />
          <img src="upi.png" alt="UPI" width="30" />
          <br />
          <select name="card_type" id="card_type" required>
            <option value="">--Select a Card Type--</option>
            <option value="visa">Visa</option>
            <option value="mastercard">Mastercard</option>
            <option value="upi">UPI</option>
          </select>
        </p>
        <p>
          Card Number:<br />
          <input
            type="number"
            name="card_number"
            id="card_number"
            required
            placeholder="1111-2222-3333-4444"
          />
        </p>
        <p>
          Expiration Date:<br />

          <input type="Date" name="exp_date" id="exp_date" required />
        </p>
        <p>
          CVV:<br />
          <input type="password" name="cvv" id="cvv" required />
        </p>
        <p>
          Holder name:<br />
          <input type="text" name="h_name" id="h_name" required />
        </p>
        <input type="submit" value="Pay Now"></input>
      </form>
    </div>
  </body>
</html>
