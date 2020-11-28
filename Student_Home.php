
<?php
require('Database_Connect.php');
    session_start();
    //If your session isn't valid, it returns you to the login screen for protection
    if(empty($_SESSION['Member_ID']))
    {
        header("location:Student_Access_Denied.php");
    }
?>
<!DOCTYPE>
<html lang="en">
    <head>
        <title>Student Home</title>
        <link href="css/Student_Home.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
        <script language="JavaScript" src="js/Student_User.js"></script>
        <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
    width: 70%;
    margin: auto;
  }
        </style>
    </head>
     <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight img" style="background-image: url(images/sidebar-bg.jpg);">
			<h1 id="colorlib-logo" class="mb-4"><a href="Student_Home.php">V-SYS</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="colorlib-active"><a href="Student_Home.php">Home</a></li>
					<li><a href="Student_Poll.php">Vote</a></li>
                    <li><a href="Student_View_Result.php">Results</a></li>
					<li><a href="Student_Profile.php">Account</a></li>
					<li><a href="Student_Change_Password.php">Change Password</a></li>
					
                    
                    <li><a href="Student_Logout.php">Logout</a></li>
				</ul>
			</nav>
        </aside>
      </div>
        <div style="background-color: antiquewhite ;padding-bottom:300px">
        <header>
            <div style="margin-left:336px">
            <h1 style="color:Blue;background-color:pink;text-align:center"><b>Student Panel</b></h1>
            </div>
        </header>
        <section>
            <div style="margin-left:350px;margin-top:50px">
                <img id="homeimg" src="images/logo.jpg">
                <p style="margin-left:400px;margin-top:-250px;color:red;Font-size:25px">The Electoral College was necessary when communications were poor, literacy was low, and voters lacked information about out-of-state figures, which is clearly no longer the case.</p>
            </div>
        </section>
         </div>
    </body>
</html>