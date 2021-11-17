<?php
  require_once('db_con.php');
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Product Cart</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <style>
        body {
            background-color: burlywood;
        }

        header {
            background: url('image/cakeheader2.jpg');
            opacity: 0.9;
            padding: 50px;
            text-align: center;
            font-size: 35px;
        }

        .navi ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #eee690;
            justify-content: space-between;
        }

        .navi li {
            float: right;   
        }

        .navi li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navi li a:hover {
            border-bottom: 3px solid black;
            padding-bottom: 4px;
            transition: 0.3s ease 0.2s;
        }

        td, th {
            text-align: center;
            padding: 8px;
            background-color:#fff1d2;
        }

        </style>
</head>

<body>
  <!-- Navbar start -->
  <nav class="header">
  <header>
        <h2><i>Ad Cafe</i></h2>
    </header>

    <div class="navi">
        <ul>
            <li><a href="logout.php">Log Out</a></li>
            <li><a href="memberAbout.php">About Us</a></li>
            <li><a href="order.php">Order Now</a></li>
            <li><a href="adminMenu.php">Menu</a></li>
            <li><a href="memberMenu.php">Home</a></li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
            </li>
        </ul>
    </div>
  </nav>
  <!-- Navbar end -->

<script type="text/javascript">
$(document).ready(function() {

// Sending Form data to the server
$("#placeOrder").submit(function(e) {
  e.preventDefault();
  $.ajax({
    url: 'action.php',
    method: 'post',
    data: $('form').serialize() + "&action=order",
    success: function(response) {
      $("#showOrder").html(response);
    }
  });
});

// Load total no.of items added in the cart and display in the navbar
load_cart_item_number();

function load_cart_item_number() {
  $.ajax({
    url: 'action.php',
    method: 'get',
    data: {cartItem: "cart_item"},
    success: function(response) {
      $("#cart-item").html(response);
    }
  });
}
});
</script>
  <?php
     
     $date = date("d-m-Y");

     //get input values from form
     extract($_POST);
 
  ?>
  <br>
<section class="form" id="form">
<h1 class="heading" align="center" > <span> Your order is successful! </h1>

<p align="center">Date: <b><?php print($date) ?></b></p>
  <table align="center">
     <tr><td>Name</td>
        <td>:</td>
        <td><b><?php print($name) ?></b></td>
     </tr>
    <tr><td>Email</td>
        <td>:</td>
        <td><b><?php print($email) ?></b></td>
    </tr>
    <tr><td>Phone Number</td>
        <td>:</td>
        <td><b><?php print($phone) ?></b></td>
    </tr>
    <tr><td>Item</td>
        <td>:</td>
        <td><b><?php print ($product) ?></b></td>
    </tr>
    <tr><td>Address</td>
        <td>:</td>
        <td><b><?php print($address) ?></b></td>
    </tr>
    <tr><td>Total (RM)</td>
        <td>:</td>
        <td><b>RM<?php print($grandtotal) ?></b></td>
    </tr>
    <tr><td>Payment mode</td>
        <td>:</td>
        <td><b><?php print($pmode) ?></b></td>
    </tr>

  </table>
  </section>
  
  <script>
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "restaurant";
         
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
     
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error); }

      //create query
      $sql = "INSERT INTO order (name, email, phone, address, pmode, product, amountPaid) VALUES ('$name', '$email', '$phone', '$address', '$pmode', '$product', '$amountPaid')";
      $conn->query($sql);
      

      //close connection
      $conn->close();

  ?> 
  



  


      