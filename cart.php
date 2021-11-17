
<?php 
session_start();

if(empty($_SESSION['username'])):
   header('Location:login.html');
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cart</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css'/>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'/>
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
</head>

<body>
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

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <div style="display:<?php if (isset($_SESSION['showAlert'])) {echo $_SESSION["showAlert"];}
        else { echo "none"; } unset($_SESSION["showAlert"])?>" class="alert alert-success alert-dismissible mt-2">

          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) { echo $_SESSION['message'];} unset($_SESSION['showAlert']); ?></strong>
        
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-info m-0">Products in your cart!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a href="action.php?clear=all" class="badge-danger badge" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            
            <tbody>

              <?php
  
                require 'db_con.php';
                $sql = "SELECT * FROM cart";
                $result = $conn->query($sql);
                $grandtotal = 0;

                while ($row = $result->fetch_assoc()):
              ?>
              
              <tr>
                <td><?php echo $row['cartID']; ?></td>
                <input type="hidden" class="cartID" value="<?php echo $row['cartID']; ?>">
                <td><img src="<?php echo $row["productImage"]; ?>" width="100"  height="100"></td>
                <td><?php echo $row["productName"]; ?></td>
                
                <td>
                  <i></i><?php echo number_format($row['productPrice'],2); ?>
                </td>

                <input type="hidden" class="productPrice" value="<?php echo $row['productPrice']; ?>">
                
                <td>
                  <input type="number" class="form-control productQuantity" value="<?php echo $row['productQuantity']; ?>" style="width:75px;">
                </td>

                <td><i></i>&nbsp;&nbsp;<?php echo number_format($row["totalprice"],2); ?></td>
                
                <td>
                  <a href="action.php?remove=<?php echo $row["cartID"];?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>

              <?php $grandtotal += $row['totalprice']; ?>

              <?php endwhile; ?>
              
              <tr>
                <td colspan="3">
                  <a href="order.php" class="btn btn-success"><i class="fas cart-btn"></i>&nbsp;&nbsp;Continue Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b><i></i>&nbsp;&nbsp;<?= number_format($grandtotal,2); ?></b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info <?php echo ($grandtotal > 1); ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".productQuantity").on('change', function() {
      var $el = $(this).closest('tr');

      var id = hide.find(".id").val();
      var productPrice = hide.find(".productPrice").val();
      var productQuantity = hide.find(".productQuantity").val();
      location.reload(true);
      
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: { productQuantity: productQuantity, id:id, productPrice: productPrice },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: { cartItem: "cart_item" },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>