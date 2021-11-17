<?php 
session_start();

if(empty($_SESSION['username'])):
   header('Location:login.html');
endif;


include('db_con.php');
$status="";

if (isset($_POST['productCode']) && $_POST['productCode']!=""){
$productCode = $_POST['productCode'];
$result = mysqli_query(
$con,
"SELECT * FROM `product` WHERE `productCode`='$productCode'"
);
$row = mysqli_fetch_assoc($result);
$productName = $row['productName'];
$productCode = $row['productCode'];
$productPrice = $row['productPrice'];
$productImage = $row['productImage'];

$cartArray = array(
	$code=>array(
	'productName'=>$productName,
	'productCode'=>$productCode,
  'productQuantity'=>1,
	'productPrice'=>$productPrice,
	'productImage'=>$productImage)
);

if(empty($_SESSION["cart"])) {
    $_SESSION["cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
  }else{
    $array_keys = array_keys($_SESSION["cart"]);
    if(in_array($code,$array_keys)) {
	    $status = "<div class='box' style='color:red;'> 
      Product is already added to your cart!</div>";	
    } else {
    $_SESSION["cart"] = array_merge(
    $_SESSION["cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
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
        .card-bod h4{
          color: black;
          align: center;
        }
        .card-bod h5{
          color: black;
          align: center;
        }
        .col-sm-6 button{
          background-color:#fff1d2;
          color: black;
          border-color: black;
        }
        .col-sm-6 button:hover{
          background-color:#eee690;
          
          color: black;
          border-color: black;
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

   <!-- Displaying Products Start -->
   <div class="container">
    <div class="alert-message"></div>
    <div class="row mt-2 pb-3">
      
      <?php
        include 'db_con.php';
        $sql = 'SELECT * FROM product';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
       // output data of each row
          while($row = $result->fetch_assoc()) {
      ?>
      
      <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="<?= $row['productImage'] ?>" class="card-img-top" height="250">
            
            <div class="card-body">
              <h4 ><?= $row['productName'] ?></h4>
              <h5 ><i class="fas fa-myr-sign"></i>&nbsp;&nbsp;<?= number_format($row['productPrice'],2) ?>/-</h5>

            </div>
            <div class="card-footer">
              <form action="action.php" method="post" class="form-submit">
                
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control" name="productQuantity" value="<?= $row['productQuantity'] ?>">
                  </div>
                </div>
                
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="productName" value="<?php echo $row['productName']; ?>">
                <input type="hidden" name="productPrice" value="<?php echo $row['productPrice']; ?>">
                <input type="hidden" name="productImage" value="<?php echo $row['productImage']; ?>">
                <input type="hidden" name="productCode" value="<?php echo $row['productCode']; ?>">
                <button name="submit" id="addItemBtn" class="btn btn-success btn-md">Add to cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php }} ?>
    </div>
  </div>
  
  <!-- Displaying Products End -->
  <script src='js/bootstrap.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();

      var form = $(this).closest(".form-submit");
      var id = $form.find(".id").val();
      var productName = $form.find(".productName").val();
      var productPrice = $form.find(".productPrice").val();
      var productQuantity = $form.find(".productQuantity").val();
      var productImage = $form.find(".productImage").val();
      var productcode = $form.find(".productcode").val();


      $.ajax({
        url: 'action.php',
        method: 'post',
        data: { id:id, productName:productName, productPrice:productPrice, productQuantity: productQuantity, productImage: productImage, productcode: productcode},
        success: function(response) {
          $(".alert-message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: { cartItem: "cart_item"},
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>

</html>