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
            padding-right: 10px;
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
        
        .button button{
            background-color: #fff1d2;
            border: 1px solid;
            border-radius: 8px;
            margin: 10px;
            padding: 10px 24px;
            
        }
    </style>
</head>

<body>
    <header>
        <h2><i>Ad Cafe</i></h2>
    </header>

    <div class="navbar">
        <ul> 
        <li><a href="logout.php">Log Out</a></li>
            <li><a href="administration.php">Administration</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="restaurant.html">Home</a></li>
            <li><p><?php echo $_SESSION['username']?></p></li>
        </ul>
    </div>
    <div class="button" >
  <button><a href="viewMember.php"  style="text-decoration: none">View Member List</a></button>
  <button><a href="viewOrder.php"  style="text-decoration: none">View Order List</a></button>
  <button><a href="register.html"  style="text-decoration: none">Register</a></button>
  
    </div>
    </body>

</html>