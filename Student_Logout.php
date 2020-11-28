<?php
session_start();
?>
<html><head>
<link href="css/logout.css" rel="stylesheet" type="text/css" />
</head><body > 
    <div id="log">
        <h1>Logged Out Successfully </h1>
</div>
<?php
session_destroy();
?>
    <a href="Student_Login.php">Back to Home</a>


</body></html>