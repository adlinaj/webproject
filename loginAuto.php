<?php 

session_start();

// Code to connect to database
include 'db_con.php';
 
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

$sql = "SELECT username, password FROM admin WHERE username='$username' and password='$password'";
$result = $conn->query($sql);

$row=mysqli_fetch_array($result);

// Mysql_num_row is counting table row
if ($result->num_rows > 0) 
{
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['username'];

    header("location:adminHome.php");
} 

$sql2 = "SELECT memUsername, memPassword FROM member WHERE memUsername='$username' and memPassword='$password'";
$result2 = $conn->query($sql2);

$row=mysqli_fetch_array($result2);

// Mysql_num_row is counting table row
if ($result2->num_rows > 0) 
{
    $_SESSION['id']=$row['id'];
    $_SESSION['username']=$row['memUsername'];

    header("location:memberHome.php");
} else {
    echo "<p>Wrong Username or Password. Please try again.</p>";
}

$conn->close();
?>