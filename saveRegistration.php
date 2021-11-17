<?php

     //get input values from form
     extract($_POST);
 
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Cafe</title>
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

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #eee690;
            justify-content: space-between;
        }

        .navbar li {
            float: right;
        }

        .navbar li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar li a:hover {
            border-bottom: 3px solid black;
            padding-bottom: 4px;
            transition: 0.3s ease 0.2s;
        }

        .myform {
            background-color: #ffff;
            width: 50%;
            height: 390px;
            margin-left: 160px;
            margin-top: 30px;
            margin-bottom: 30px;
            box-sizing: border-box;
            text-align: center;
            border-radius: 10px;
        }
        .myform h2 {
            text-align: center;
            padding: 30px;
            width: 70%;
        }
        .myform a{
            text-decoration: none;
            color: black	;
        }
        
    </style>
</head>

<body>
    <header>
        <h2><i>Ad Cafe</i></h2>
    </header>

    <div class="navbar">
        <ul>
            <li><a href="login.html">Log In</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="order.html">Order Now</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="restaurant.html">Home</a></li>
        </ul>
    </div>
    <div class="myform">
        <h2>Member Registration</h2>
        <form class="login" action="saveRegistration.php" method="post">
            <div class="input">
                <label for="username">Username : <?php print($memUsername) ?></label>
            </div> <br>
            <div class="input">
                <label for="password">Password : <?php print($memPassword) ?></label>
                
            </div><br>
            <div class="input">
                <label for="name">Name : <?php print($memberName) ?></label>
                
            </div><br>
            <div class="input">
                <label for="address">Address : <?php print($memberAdd) ?></label>
                
            </div><br>
            <div class="input">
                <label for="email">Email : <?php print($memberEmail) ?></label>
                
            </div><br>
            <div class="input">
                <label for="contact">Contact : <?php print($memberContact) ?></label>
                
            </div><br> 
        </form>

    </div>

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
      $sql = "INSERT INTO member (memUsername, memPassword, memberName, memberAdd, memberEmail, memberContact) VALUES ('$memUsername', '$memPassword', '$memberName', '$memberAdd', '$memberEmail', '$memberContact')";
      //execute query
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } 
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      //close connection
      $conn->close();
  ?> 

  <br>

  <form>
     <input type="button" name="printButton" onClick="window.print()" value="Print">
  </form>
  <form>
     <button><a href="login.html"  style="text-decoration: none">Log In</a></button>
  </form>
  <form>
     <button><a href="register.html"  style="text-decoration: none">Back</a></button>
  </form>

</body>
</html>