<?php 
session_start();

if(empty($_SESSION['username'])):
   header('Location:login.html');
endif;
?>

<html>
<head>
  <title>View Member List</title>
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
        .member table{
            color= red;
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
            <li><a href="memberMenu.php">Home</a></li>
            <li><p><?php echo $_SESSION['username']?></p></li>
        </ul>
    </div>

  <h3 align="center">Member List</h3>
  <form align="center" action="recordDisplay.php" method="post">

Member Name: <input name="memberName" type="text" size="30"><br><br>
<input type="submit" name="Submit" value="Search"><br><br>

</form>
<div class="member">
<?php
  include 'db_con.php';

  //create and execute query
  $sql = "SELECT * FROM member";
  $result = $conn->query($sql);

  //check if records were returned
  if ($result->num_rows > 0) {
     //create a table to display the record
     echo '<table cellpadding=10 cellspacing=0 border=1 align="center">';
     echo '<tr><td align="center"><b>No</b></td>
     <td align="center"><b>Username</b></td>
     <td align="center""><b>Password</b></td>
     <td align="center"><b>Name</b></td>
     <td align="center"><b>Address</b></td>
     <td align="center"><b>Email</b></td>
     <td align="center"><b>Contact</b></td></tr>';
     
     
     // output data of each row
     while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td align="center">'.$row["memberID"].'</td>';
        echo '<td align="center">'.$row["memUsername"].'</td>';
        echo '<td align="center">'.$row["memPassword"].'</td>';
        echo '<td align="center">'.$row["memberName"].'</td>';
        echo '<td align="center">'.$row["memberAdd"].'</td>';
        echo '<td align="center">'.$row["memberEmail"].'</td>';
        echo '<td align="center">'.$row["memberContact"].'</td>';
        echo '<td><a href="recordDelete.php?memberID='.$row["memberID"].'">DELETE</a></td>';
        echo '<td><a href="recordEdit.php?memberID='.$row["memberID"].'">UPDATE</a></td>';
        echo '</tr>';
     }
  } 
  else {
    echo "0 results";  //if no record found in the database
  };

?>
</div>

</body>
</html>