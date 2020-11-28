<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link href="css/admin_login.css" rel="stylesheet" type="text/css">
        <script language="JavaScript" src="js/Admin.js"></script>
    </head>
    <body backgroundimage="images/div.jpg">
        <div id="login">
            <h2>Administrator Login</h2><br><br>
            <form action="Admin_Check_Login.php" method="post"
                  onsubmit="return loginValidate(this)">
                <label id="lb1">Admin Name :</label><br><br>
                <input id="name" name="username" placeholder="UserName" type="text"><br><br>
                <label id="lb2">Password :</label><br><br>
                <input id="password" name="password" placeholder="Password" type="password"><br><br><br><br>
                <input name="Submit" type="submit" value=" Login ">
                <br><br><br>
                <i>Not Yet Registered?</i> <a href='Admin_Registration.php'><b>  Register Here</b></a><br><br>
                <i>----> Go back to Home</i><b><a href="Home.php">  Click Here  </a></b>
            </form>
        </div>
    </body>
</html>