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
        .title h2{
            text-align: center;
            
        }
        .cake img{
            margin-top: 30px;
            margin-left: 300px;
            margin-bottom: 100px;
            float: left;
            width: 350px;
            height: 300px;
            box-sizing: border-box;
            border-radius: 10px;
        }
        .western img{
            margin-top: 30px;
            margin-right: 300px;
            margin-bottom: 100px;
            float: right;
            width: 350px;
            height: 300px;
            box-sizing: border-box;
            border-radius: 10px;
        }
        .cake img:hover{
            filter: brightness(110%);
            transform: scale(1.1);
            transition: 0.3s ease 0.2s;
        }
        .western img:hover{
            filter: brightness(110%);
            transform: scale(1.1);
            transition: 0.3s ease 0.2s;
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
            <li><a href="memberAbout.php">About Us</a></li>
            <li><a href="order.php">Order Now</a></li>
            <li><a href="adminMenu.php">Menu</a></li>
            <li><a href="memberMenu.php">Home</a></li>
            <li><p><?php echo $_SESSION['username']?></p></li>
        </ul>
    </div>
    <div class="title">
        <h2>Our Menu</h2>
    </div>
    <div class="container">
        <div class="cake">
            <a href="cakemenu.html"><img src="image/chocindulge.jpeg" alt="Menu"></a>
        </div>
        <div class="western">
            <a href="westernmenu.html"><img src="image/aglioalio.jpg" alt="Menu"></a>
        </div>
    </div>
</body>
</html>