<?php
require_once('db_con.php');
$sql = "SELECT * FROM order;";
$result = $conn->query($sql);
// Turn off all error reporting
//error_reporting(0);
?>


<!DOCTYPE html>
<html>
<head>
<style>
        body {
            background-color: burlywood;
        }

        header {
            background: url('image/cakeheader2.jpg');
            opacity: 0.9;
            padding: 5px;
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
        border: 1px solid #dddddd;
        text-align: left;
        
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

<h3 align="center">View Order List </h3>

<table cellpadding=10 cellspacing=0 border=1 align="center">>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Payment</th>
    <th>Products</th>
    <th>Total</th>
  </tr>

    <?php
   
  foreach ($result as $results) {
    echo '<tr><td>' . $results['id'] . '</td>
    <td>' . $results['name'] . '</td>
    <td>' . $results['email'] . '</td>
    <td>' . $results['address'] . '</td>
    <td>' . $results['pmode'] . '</td>
    <td>' . $results['product'] . '</td>
    <td>' . $results['amountPaid'] . '</td></tr>';
  }
  //close connection 
  $conn->close();
  echo '<button><a href="administration.php">Back</button><br><br>';
  ?>
               

</table>

</body>
</html>