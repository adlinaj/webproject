<html>
<head>
  <title>View Member</title>
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
    <h3 align="center">Member List</h3>
    <?php
  include 'db_con.php';

  //escape special characters in a string
  $memberName = mysqli_real_escape_string($conn, $_POST['memberName']);

  //create and execute query
  $sql = "SELECT * FROM member WHERE memberName= '$memberName'";
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
    echo '<font color=red>No record found';
  }

  //close connection 
  $conn->close();
  echo '<p><a href="viewMember.php">Back to Member List</a></p>';
?>

</body>
</html>