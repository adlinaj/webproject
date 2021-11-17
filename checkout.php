<?php
  require 'db_con.php';

//   if(empty($_SESSION['username'])):
//     header('Location:login.html');
//  endif;

  $grandtotal = 0;
  $allItems = '';
  $items = array();

  $sql = "SELECT CONCAT(productName, '(',productQuantity,')') AS productQuantity, totalprice FROM cart";
  $result = $conn->query($sql);

  while ($row = $result->fetch_assoc()) {
    $grandtotal = $grandtotal + $row['totalprice'];
    $items[] = $row['productQuantity'];
  }
  $allItems = implode(', ', $items);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Checkout</title>
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

  <div class="container">

<div class="row justify-content-center">
  <div class="col-lg-6 px-4 pb-4" id="showOrder">

    <h4 class="text-center text-info p-2">Complete your order!</h4>
    <div class="jumbotron p-3 mb-2 text-center">

      <h6 class="lead"><b>Product(s) : </b><?php echo $allItems; ?></h6>
      <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
      <h5><b>Total Amount Payable : </b><?php echo number_format($grandtotal,2)?>/-</h5>
    </div>

    <form action="saveCheckout.php" method="post" id="placeOrder">
      <input type="hidden" name="product" value="<?php echo $allItems ?>">
      <input type="hidden" name="grandtotal" value="<?php echo $grandtotal ?>">

      <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
      </div>

      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <input type="phone" name="phone" class="form-control" placeholder="Enter number phone" required>
      </div>

      <div class="form-group">
        <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
      </div>

      <h6 class="text-center lead">Select Payment Mode</h6>
      <div class="form-group">
        <select name="pmode" class="form-control">
          <option value="" selected disabled>-Select Payment Mode-</option>
          <option value="CoD">Cash On Delivery</option>
          <option value="Online Banking">Online Banking</option>
        </select>
      </div>

      <div class="form-group">
        <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
      </div>
      
    </form>
  </div>
</div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>


</body>

</html>