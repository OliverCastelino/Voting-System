<?php
    ini_set ("display_errors", "1");
    error_reporting(E_ALL);
    ob_start();
    session_start();
    require('Database_Connect.php');
    
$tbl_name="Members";
// Defining your login details into variables
    $Username=$_POST['username'];
    $Password=$_POST['password'];
    $Encrypted_Password=md5($Password); //MD5 Hash for security
// MySQL injection protections
    $Username = stripslashes($Username);
    $Password = stripslashes($Encrypted_Password);
//$myusername = mysqli_real_escape_string($myusername);
//$mypassword = mysqli_real_escape_string($mypassword);
    $sql=mysqli_query($con, "SELECT * FROM Members WHERE Email='$Username' and password='$Password'");
    // Checking table row
    $count=mysqli_num_rows($sql);
// If username and password is a match, the count will be 1

    if($count==1)
    {
// If everything checks out, you will now be forwarded to student.php
        $user = mysqli_fetch_assoc($sql);
        $_SESSION['Member_ID'] = $user['Member_ID'];
        header("location:Student_Home.php");
    }
//If the username or password is wrong, you will receive this message below.
    else 
    {
        echo "<h2>Wrong Username or Password<h2><br><br>Return to <a href=\"Student_Login.html\">login</a>";
    }

    ob_end_flush();
?> 
