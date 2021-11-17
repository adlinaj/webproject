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

$memberID=$_REQUEST['memberID'];
$query = "SELECT * from member where memberID='".$memberID."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
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
<div class="form">

<h1>Update Record</h1>

<div>
<form name="form" method="post" action="recordUpdate.php"> 
<input type="hidden" name="new" value="1" />
<input name="memberID" type="hidden" value="<?php echo $row['memberID'];?>" />
<p>Username : <input type="text" name="memUsername" value="<?php echo $row['memUsername'];?>" /></p>
<p>Password : <input type="text" name="memPassword" value="<?php echo $row['memPassword'];?>" /></p>
<p>Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="memberName" value="<?php echo $row['memberName'];?>" /></p>
<p>Address &nbsp&nbsp: <input type="text" name="memberAdd" value="<?php echo $row['memberAdd'];?>" /></p>
<p>Email &nbsp&nbsp&nbsp&nbsp&nbsp: <input type="text" name="memberEmail" value="<?php echo $row['memberEmail'];?>" /></p>
<p>Contact &nbsp&nbsp: <input type="text" name="memberContact" value="<?php echo $row['memberContact'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>

</div>
</div>
</body>
</html>