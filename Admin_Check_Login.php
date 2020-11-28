<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();
require('Database_Connect.php');

$tbl_name="Administrators"; // Table name


// Defining your login details into variables
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

$encrypted_mypassword=md5($mypassword); //MD5 Hash for security

// MySQL injection protections
$myusername = stripslashes($myusername);
$mypassword = stripslashes($encrypted_mypassword);

//$myusername = mysqli_real_escape_string($myusername);
//$mypassword = mysqli_real_escape_string($mypassword);SSSS

//echo $mypassword." ".$myusername;

$sql=mysqli_query($con, "SELECT * FROM Administrators WHERE Email='$myusername' and Password='$mypassword'");
// Checking table row
$count = mysqli_num_rows($sql);

// If username and password is a match, the count will be 1
if($count)
{
// If everything checks out, you will now be forwarded to admin.php

  $user=mysqli_fetch_assoc($sql); 
  $_SESSION['Admin_ID'] = $user['Admin_ID'];
  header("location:Admin_Home.php");
}
//If the username or password is wrong, you will receive this message below.
else {
  echo "Wrong Username or Password<br><br>Return to <a href=\"Admin_Login.html\">Login</a>";
  }
  
ob_end_flush();
?>