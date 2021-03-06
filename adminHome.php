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

        .box {

            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr 1fr;
            grid-template-areas:
                "section promo aside"
                "section promo aside"
                "section promo footer"
            ;
        }

        section {
            font-family: lobster;
            float: left;
            background-color: #fff1d2;
            opacity: 0.9;
            color: black;
            padding: 30px;
            width: 20%;
        }

        .section {
            padding-left: 5px;
        }

        .section a {
            color: black;
            text-decoration: none;
        }

        article {
            font-family: calibri;
            float: left;
            background-color: #ffe4c8;
            opacity: 0.9;
            color: black;
            text-align: center;
            padding: 20px 100px 20px 90px;
            
        }

        .promo a {
            color: black;
            text-decoration: none;
        }
        .promo a img:hover{
            filter: brightness(125%);
            transform: scale(1.1);
        }

        aside {
            font-family: calibri;
            float: left;
            background-color: #fff1d2;
            opacity: 0.9;
            color: black;
            padding: 30px 50px;
            width: 25%;
        }
        .membership h1 a{
            text-decoration: none;
            color: black;
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
            <li><a href="adminMenu.php">Menu</a></li>
            <li><a href="adminHome.php">Home</a></li>
            <li><p><?php echo $_SESSION['username']?></p></li>
        </ul>
    </div>
    <div class="box">
        <div class="section">
            <section>
                <h1><a href="restaurant.html">Welcome to Ad Cafe!</a></h1>
                <h4>Our restaurant sells a very delicious <br>
                    cakes and western dishes! You will <br>
                    never regret it!</h4>
            </section>
        </div>
        <div class="promo">
            <article>
                <h1><a href="promo.html">Promotions</a></h1>
                <h4>This coupons only for registered members.</h4>
                <h3><a href="https://www.secretrecipe.com.my/promotion/rm24-for-a-full-course-meal">RM24 for a full
                        Course Meal</a></h3>
                <a href="https://www.secretrecipe.com.my/promotion/rm24-for-a-full-course-meal"><img
                        src="image/cakepromo1.jpg" alt="Promotion" width="350px" height="300px"></a>

            </article>
        </div>
        <div class="membership">
            <aside>
                <h1><a href="login.html" >Join our Membership!</a></h1>
                <h4>Join us and you can get so many suprises from us!!</h4>
                <h1>Join our Team!</h1>
                <h4>We are hiring! If you think you have the abilities and creativities, we are welcoming you to join us!</h4>
            </aside>
        </div>
    </div>
    
</body>

</html>