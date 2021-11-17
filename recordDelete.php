<html>
<head>
  <title>Member List</title>
</head>
<body>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "restaurant";
     
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  //get input value
  $memberID=$_REQUEST['memberID'];

  // sql to delete a record
  $sql = "DELETE FROM member WHERE memberID='".$memberID."'";

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } 
  else {
    echo "Error deleting record: " . $conn->error;
  }

  //close connection  
  $conn->close();
  echo '<p><a href="viewMember.php">Back to Main Menu</a></p>';
?>
</body> 
</html>