<?php
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    extract($_REQUEST);
    require_once('Database_Connect.php');
    $q="SELECT * FROM Members WHERE Email='$email'";
    $result=mysqli_query($con,$q);
    if(mysqli_num_rows($result))
    {
        echo"Email is already exist try Another";
    }
    else
    {
        echo"";
    }
?>