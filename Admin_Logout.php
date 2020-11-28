<?php
session_start();
?>
<html>
    <head>
        <style>
        h2
{
    text-align:center;
    border-radius:10px 10px 0 0;
    margin:-10px -40px;
    padding:15px;
    font-size: 50px;
    font-family: serif;
    color: red
}
        </style>

</head><body > 
    
        <h2>Logged Out Successfully </h2>


<?php
session_destroy();
?>
    <a href="Home.php">Back to Home</a>


</body></html>