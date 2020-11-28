

<?php
    session_start();
    require('Database_Connect.php');
    //If your session isn't valid, it returns you to the login screen for protection
    if(empty($_SESSION['Admin_ID']))
    {
        header("location:Admin_Access_Denied.php");
    }
?>

<!DOCTYPE>
<html lang="en">
    <head>
        <title>Admin Home</title>
        <link href="css/Admin_home.css" rel="stylesheet" type="text/css">
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
        <script language="JavaScript" src="js/Admin.js"></script>
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
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>;
		<aside id="colorlib-aside" role="complementary" class="js-fullheight img" style="background-image: url(images/sidebar-bg.jpg);">
			<h1 id="colorlib-logo" class="mb-4"><a href="Admin_Home.php">V-SYS</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="colorlib-active"><a href="Admin_Home.php" >Home</a></li>
					<li><a href="Admin_Manage_position.php">Position</a></li>
					
					<li><a href="Admin_Manage_Candidates.php">Candidate</a></li>
					<li><a href="Admin_Poll_Results.php">Results</a></li>
                    <li><a href="Admin_Poll_Report.php">Report</a></li>
                    <li><a href="Admin_Manage_Account.php">Account</a></li>
                    
                    <li><a href="Admin_Logout.php">Logout</a></li>
				</ul>
			</nav>
        </aside>
      </div>
        <div style="background-color:antiquewhite">
        <header>
            <div style="margin-left:336px;margin-top:-28px">
            <h1 style="color:Blue;background-color:pink;text-align:center">Administrator Control Panel</h1>
            </div>
        </header>
        <section>
            <div style="margin-left:450px;margin-top:10px">
                <img id="homeimg" src="images/home.gif">
            </div>
        </section>
        </div>
    </body>
</html>
