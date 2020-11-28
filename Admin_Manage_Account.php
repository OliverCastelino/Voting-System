<?php
session_start();
require('Database_Connect.php');
?>
<!DOCTYPE>
<html lang="en">
    <head>
        <title>Admin Manage Account</title>
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
        <style>
          
            lable[name=l1]
            {
                font-size: 25px;
                margin-left: 210px
            }
            input[name=fullname]
            {
                font-size: 20px;
                margin-left: 60px;
                width:300px
            }
            lable[name=l2]
            {
                font-size: 25px;
                margin-left: 210px
            }
            input[name=email]
            {
                font-size: 20px;
                margin-left: 103px;
                width:300px
            }
            lable[name=l3]
            {
                font-size: 25px;
                margin-left: 210px
            }
            input[name=phonenumber]
            {
                font-size: 20px;
                margin-left: 5px;
                width:300px
            }
            input[name=update]
            {
                font-size: 20px;
                margin-left: 350px;
                margin-top:10px;
                background-color: orangered
            }
        </style>
        </head>
    <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight img" style="background-image: url(images/sidebar-bg.jpg);">
			<h1 id="colorlib-logo" class="mb-4"><a href="Admin_Home.php">V-SYS</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="Admin_Home.php">Home</a></li>
					<li><a href="Admin_Manage_position.php">Position</a></li>
					
					<li><a href="Admin_Manage_Candidates.php">Candidate</a></li>
					<li><a href="Admin_Poll_Results.php">Results</a></li>
                    <li><a href="Admin_Poll_Report.php">Report</a></li>
                    <li class="colorlib-active"><a href="Admin_Manage_Account.php">Account</a></li>
                    <li><a href="Admin_Logout.php">Logout</a></li>
				</ul>
			</nav>
        </aside>
      </div>
        <div style="background-color: antiquewhite ;padding-bottom:300px">
        <header>
            <div style="margin-left:336px">
            <h1 style="color:Blue;background-color:pink;text-align:center"><b>Manage Account</b></h1>
            </div>
        </header>
        <section>
            <div style="margin-left:341px;margin-top:50px">
<?php
//If your session isn't valid, it returns you to the login screen for protection
            if(empty($_SESSION['Admin_ID']))
            {
                header("location:Admin_Access_Denied.php");
            }

//fetch data for update file
            $result=mysqli_query($con, "SELECT * FROM administrators WHERE Admin_ID = '$_SESSION[Admin_ID]'");
            if (mysqli_num_rows($result)<1)
            {
                $result = null;
            }
                $row = mysqli_fetch_array($result);
            if($row)
    {
            // get data from db
        $adminId = $row['Admin_ID'];
        $FullName = $row['Full_Name'];
        $Email = $row['Email'];
        $PhoneNumber = $row['Phone_Number'];
    }

//process
if (isset($_GET['id']) && isset($_POST['update']))
{
$myId = addslashes( $_GET['id']);
$myFullname = $_POST['fullname']; 
    $myEmail = $_POST['email']; 
    $myPhoneNumber = $_POST['phonenumber'];



$sql = mysqli_query($con, "UPDATE administrators SET Full_Name='$myFullname', Email='$myEmail', Phone_Number='$myPhoneNumber' WHERE Admin_ID = '$myId'" );
    
    header("Location: Admin_Manage_Account.php");
}
?>
    <form action="Admin_Manage_Account.php?id=<?php echo $_SESSION['Admin_ID']; ?>" method="post" onSubmit="return updateProfile(this)">
                
                <lable name="l1">Full Name:</lable>
                <input type="text" style="background-color:white; font-weight:bold;" name="fullname" maxlength="20" value="<?php echo $FullName ?>"><br><br>
        <lable name="l2">Email :</lable>
        <input type="text" style="background-color:white; font-weight:bold;" name="email" maxlength="40" value="<?php echo $Email ?>"><br><br>
        <lable name="l3">Phone Number:</lable>
        <input type="text" style="background-color:white; font-weight:bold;" name="phonenumber" maxlength="100" value="<?php echo $PhoneNumber?>"><br><br>
        <input type="submit" name="update" value="Update Account">
            
            </form>
            </div>
        </section>
        </div>
    
        </body>
</html>