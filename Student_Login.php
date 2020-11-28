<!DOCTYPE html>
<html>
    <head>
        <title>Student Login</title>
        <link href="css/Student_login.css" rel="stylesheet" type="text/css">
        <script language="JavaScript" src="js/Student_User.js"></script>
    </head>
    <body>
        <div id="login">
            <h2>Student Login</h2><br><br>
            <form name="form1" action="Student_Check_Login.php" method="post" onsubmit="return loginValidate(this)">
                <label id="lb1">User Name :</label><br><br>
                <input id="name" name="username" placeholder="UserName" type="text"><br><br>
                <label id="lb2">Password :</label><br><br>
                <input id="password" name="password" placeholder="Password" type="password"><br><br><br><br>
                <input name="Submit" type="submit" value=" Login "><br><br><br>
                <i>Not Yet Registered?</i> <a href='Student_Register.php'><b>  Register Here</b></a><br><br>
                <i>Login As Admin</i><b><a href="Admin_Login.php">  Click Here  </a></b>
        
            </form>
        </div>
    </body>
</html>