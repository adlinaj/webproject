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
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="order.css">
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
            margin: 40px;
            height: 400px;
            background-color: #FFFACD;
            border-style: double;
        }

        .desc {
            font-family: Arial;
            float: left;
            color: black;
            margin-left: 5%;
            margin-top: 90px;
            margin-bottom: 90px;
            width: 55%;
            text-align: justify;
        }

        .kedai img {
            float: right;
            margin-top: 50px;
            margin-right: 5%;
            margin-bottom: 50px;
            width: 350px;
            height: 300px;
            box-sizing: border-box;
            border: 3px solid;
        }

        .kedai img:hover {
            filter: brightness(125%);
            transform: scale(1.1);
        }

        .box2 {
            margin: 40px;
            height: 450px;
            background-color: #FFFACD;
            border-style: double;
        }

        .article {
            font-family: Arial;
            float: right;
            color: black;
            margin-right: 5%;
            margin-top: 90px;
            margin-bottom: 90px;
            width: 55%;
            text-align: justify;
        }

        .concept img {
            float: left;
            margin-top: 50px;
            margin-left: 5%;
            margin-bottom: 30px;
            width: 325px;
            height: 350px;
            box-sizing: border-box;
            border: 3px solid;
        }

        .concept img:hover {
            filter: brightness(125%);
            transform: scale(1.1);
        }

        .faq {
            margin: 40px;
            height: 750px;
            background-color: #FFFACD;

        }

        .faq1 {
            text-align: center;
            float: left;
            padding: 30px;
            width: 60%;
        }

        .contact {
            text-align: center;
            float: right;
            padding: 30px;
            width: 30%;
        }

        .quest {
            float: left;
            font-family: Arial;
            color: black;
            margin-left: 5%;
            margin-top: 10px;
            margin-bottom: 90px;
            margin-right: 5%;
            width: 60%;
            text-align: justify;
        }

        .sidebar h2 {
            width: 20%;
            background-color: blue;
            float: right;
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
            <li><a href="memberMenu.php">Menu</a></li>
            <li><a href="memberHome.php">Home</a></li>
            <li><p><?php echo $_SESSION['username']?></p></li>
        </ul>
    </div>
    <div class="box">
        <div class="desc">
            <h2>About Us</h2>
            <p>Ad Cafe promises a value lifestyle proposition of great variety and quality food at affordable prices.
                The uncompromising quality of food.</p>
            <p>Founded in 2017, made its mark, renowned for its extensive range of fine quality gourmet cakes. It has
                since evolved to become one of the fastest growing lifestyle cakes and café chain</p>
        </div>
        <div class="kedai">
            <img src="image/kedai.jpg" alt="Our Shop">
        </div>
    </div>
    <div class="box2">
        <div class="article">
            <h2>café CONCEPT AND AMBIENCE</h2>
            <p>Ad Café offers a friendly and personalised full-service dining experience for customers and incorporates
                a modern contemporary and vibrant interior concept with comfort ambience, and great food. It provides a
                great respite for customers to enjoy good food and quality time with friends, family or associates,
                after a long day at work.</p>
        </div>
        <div class="concept">
            <img src="image/kedai3.jpg" alt="Our Shop">
        </div>
    </div>
    <div class="faq">
        <div>
            <h2 class="faq1">FAQ</h2>
            <h2 class="contact">Contact Us</h2>
        </div>
        <div class="quest">
            <h3>1. Are your products Halal?</h3>
            <p>Yes, Absolutely. Ad Cafe cakes are proudly Halal certified to the highest standard from the Department of
                Islamic Development of Malaysia (JAKIM).</p>
            <h3>2. How long can i keep the cake?</h3>
            <p>All cakes are made using fresh ingredients, Secret Recipe strongly recommend to consume the cake within
                the same day of purchase.
                If there’s any leftovers, please keep the cake fully sealed in an air-tight plastic container in the
                fridge to prevent dehydration/contamination and consume as soon as possible.</p>
            <h3>3. How do i keep the cake when i received it?</h3>
            <p>Please keep the cake to chiller within 30 minutes to avoid melting and maintain the quality of the cake.
                All cakes must be kept refrigerated (2°c – 6°c) at all times before serving.
            </p>
            <h3>4. Can I customize my cake?</h3>
            <p>Ad Cafe cake’s size can be customized based on recipe (e.g. 1 recipe = 2KG, 2 recipe = 4KG) instead of
                weight (KG).
                <br>
                <br>
                If you are looking for 3D cake design, you may contact the nearest outlet to you to place order. Ad Cafe
                do not offer delivery service for 3D cake and customer is required to arrange self-pickup for the cake
                at the nearest outlet. Please be noted that the outlet needs at least 5-7 days to process your order.
            </p>
            <h3>5. Are Ad Cafe suitable for vegetarian?</h3>
            <p>Ad Cafe cakes are not vegetarian/vegan friendly though we have 1 eggless cake - Oreo Cheesecake. Ad cafe
                cheesecakes’ base uses biscuits or cookies and generally butter is used and it may contain eggs and
                milk. All cheesecakes may contain fish-based gelatin and will not be suitable for vegetarian dietary.
            </p>
        </div>
        <div class="sidebar">
            <p>Phone Number : 03-98754321</p>
            <p>Email : <a id="mail" href="mailto:nuradlina0702@gmail.com"
                    style="text-decoration: none; color: black;">nuradlina0702@gmail.com</a></p>
            <p>Facebook : Ad Cafe</p>
            <p>Instagram : @adCafeOfficial</p>
            <p>Twitter : @adCafeOfficial</p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.6064709733664!2d101.86155571422131!3d2.92889825528522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdce40d4f7b293%3A0xed2c2472c565af24!2s21%2C%20Jalan%205%2F33%2C%20Bandar%20Rinching%20Seksyen%205%2C%2043500%20Semenyih%2C%20Selangor!5e0!3m2!1sms!2smy!4v1635701155350!5m2!1sms!2smy"
                width="300" height="175" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</body>

</html>