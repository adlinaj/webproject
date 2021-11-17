<?php
    session_start();
    require 'db_con.php';

    // Add products into the cart table
    if (isset($_POST["submit"])){
      
      if(isset($_POST["id"]) && isset($_POST["productName"]) && isset($_POST["productPrice"]) && isset($_POST["productImage"]) && isset($_POST["productCode"])) {
        $id = $_POST["id"];
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];
        $productQuantity = $_POST["productQuantity"];
        $productImage = $_POST["productImage"];
        $productCode = $_POST["productCode"];
        
        
        $totalprice = $productPrice * $productQuantity;
        $check_code = null;
       
        $sql = "SELECT productCode FROM cart WHERE productCode='$productCode'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
       // output data of each row
          while($row = $result->fetch_assoc()) {
            $check_code = $row["productCode"];
        }
       }
        
        if (true) {
          $sql = "INSERT INTO cart (productName, productPrice, productImage, productQuantity, totalprice, productCode) VALUES ('$productName', '$productPrice', '$productImage', '$productQuantity', '$totalprice', '$productCode')";
          $conn->query($sql);
  
          echo "<div class='alert alert-success alert-dismissible mt-2'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Item added to your cart!</strong>
                          </div>";
        } else {
          echo "<div class='alert alert-danger alert-dismissible mt-2'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Item already added to your cart!</strong>
                          </div>";
        }
      }
    }
    

    // Get no.of items available in the cart table
    if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
      $sql = "SELECT * FROM cart";
      $result = $conn->query($sql);
      $rows = $result->num_rows;

      echo $rows;
    }

    // Remove single items from cart
    if (isset($_GET['remove'])) {

      $cartID = $_GET['remove'];
      $sql = "DELETE FROM cart WHERE cartID='$cartID'";
      $result = $conn->query($sql);

      $_SESSION['showAlert'] = 'block';
      $_SESSION['message'] = 'Item removed from the cart!';
      header('location:cart.php');
    }

    // Remove all items at once from cart
    if (isset($_GET["clear"])) {

		$cartID = $_GET["clear"];
      	$sql = "DELETE FROM cart";
      	$result = $conn->query($sql);

      $_SESSION['showAlert'] = 'block';
      $_SESSION['message'] = 'All Item removed from the cart!';
      header('location:cart.php');
    }

    // Set total price of the product in the cart table
    if (isset($_POST['productQuantity'])) {
      $productQuantity = $_POST['productQuantity'];
      $id = $_POST['id'];
      $productPrice = $_POST['productPrice'];

      $totalprice = $productQuantity * $productPrice;

      $sql = "UPDATE cart SET productQuantity='$productQuantity', totalprice='$totalprice' WHERE id='$id'";
      $result = $conn->query($sql);
      
    }

    //Checkout and save customer info in the orders table
    if (isset($_POST["submit"])){
    
    if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["address"]) && isset($_POST["pmode"])) {
    
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
	    $pmode = $_POST['pmode'];
      $product = $_POST['product'];
      $grandtotal = $_POST['grandtotal'];
      
      $data = '';

      // $sql = "INSERT INTO order(name, email, phone, address, pmode, product, grandtotal) VALUES ('$name', '$email', '$phone', '$address', '$pmode','$product', '$grandtotal')";
      // $conn->query($sql);
      

                echo "<h1 class='display-4 mt-2 text-danger'>Thank You!</h1>";
								echo "<h2>Your Order Placed Successfully!</h2>";

                $product = $_POST['product'];
								echo "<h4 class='bg-danger text-light rounded p-2'>Items Purchased : {$product} </h4>";
								
                $name = $_POST['name'];
                echo "<h4>Your Name : {$name} </h4>";
                	
                $email = $_POST['email'];
                echo "<h4>Your E-mail : {$email} </h4>";	
                
                $phone = $_POST['phone'];
								echo "<h4>Your Phone : {$phone}  </h4>";

                $address = $_POST['address'];
                echo "<h4>Your address : {$address}  </h4>";
                
                $grandtotal = $_POST['grandtotal'];
								echo "<h4>Total Amount Paid : ".number_format($grandtotal,2)." </h4>";
								
                $pmode = $_POST['pmode'];
                echo "<h4>Payment Mode : {$pmode} </h4>";		
    }}
?>