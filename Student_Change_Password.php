<?php
    session_start();
    require('Database_Connect.php');

    //If your session isn't valid, it returns you to the login screen for protection
    if(empty($_SESSION['Member_ID']))
    {
        header("location:Student_Access_Denied.php");
    } 
    //retrive student details from the tbmembers table
    $result=mysqli_query($con, "SELECT * FROM Members WHERE Member_ID = '$_SESSION[Member_ID]'");

    if (mysqli_num_rows($result)<1)
    {
        $result = null;
    }
    $row = mysqli_fetch_array($result);

    if($row)
    {
        // get data from db
        $stdId = $row['Member_ID']; 
        $encpass= $row['Password'];
    }
?>

<?php
    // updating sql query
    if (isset($_POST['changepass']))
    {
        $myId =  $_REQUEST['id'];
        $oldpass = md5($_POST['oldpass']);
        $newpass = $_POST['newpass'];
        $conpass = $_POST['conpass'];
        if($encpass == $oldpass)
        {
            if($newpass == $conpass)
            {
                $newpassword = md5($newpass); //This will make your password encrypted into md5, a high security hash
                $sql = mysqli_query($con,"UPDATE Members SET Password='$newpassword' WHERE Member_ID = '$myId'" );
                echo "<script>alert('Password Changed')</script>";
            }
            else
            {
                echo "<script>alert('New and Confirm Password Not Match')</script>";
            }

        }
        else
        {
            echo "<script>alert('Old password not match')</script>";
        }


        // redirect back to profile
        // header("Location: manage-profile.php");
        }
?>
<!DOCTYPE>
<html lang="en">
    <head>
        <title>Student Change Password</title>
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
        <style>
         h4
            {
               margin-left: 280px;
                font-size: 25px; 
            }
            label[name=lb1]
            {
                font-size: 25px;
                margin-left: 210px
            }
            input[name=oldpass]
            {
                font-size: 20px;
                margin-left: 115px
            }
            lable[name=lb2]
            {
                font-size: 25px;
                margin-left: 210px
            }
            input[name=newpass]
            {
                font-size: 20px;
                margin-left: 105px
            }
            lable[name=lb3]
            {
                font-size: 25px;
                margin-left: 210px
            }
            input[name=conpass]
            {
                font-size: 20px;
                margin-left: 10px
            }
            input[name=changepass]
            {
                font-size: 20px;
                margin-left: 400px;
                margin-top:10px;
                background-color: orange
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
					<li ><a href="Student_Home.php">Home</a></li>
					<li><a href="Student_Poll.php">Vote</a></li>
                    <li><a href="Student_View_Result.php">Results</a>
					<li ><a href="Student_Profile.php">Account</a></li>
					<li class="colorlib-active"><a href="Student_Change_Password.php">Change Password</a></li>
					
                    
                    <li><a href="Student_Logout.php">Logout</a></li>
				</ul>
			</nav>
        </aside>
      </div>
        <div style="background-color: antiquewhite ;padding-bottom:300px">
        <header>
            <div style="margin-left:336px">
            <h1 style="color:Blue;background-color:pink;text-align:center"><b>Change Password</b></h1>
            </div>
        </header>
        <section>
            <div style="margin-left:350px;margin-top:50px">
                <form action="Student_Change_Password.php?id=<?php echo $_SESSION['Member_ID']; ?>" method="post">

                    <label name="lb1">Old Password:</label>
    <input type="password" style="background-color:white; font-weight:bold;" name="oldpass" maxlength="10" value=""><br><br>
    <lable name="lb2">New Password:</lable>
    <input type="password" style="background-color:white; font-weight:bold;" name="newpass" maxlength="10" value=""><br><br>
                    <lable name="lb3">Confirm New Password:</lable>
    <input  type="password" style="background-color:white; font-weight:bold;" name="conpass" maxlength="15" value=""><br><br>
    <input type="submit" name="changepass" value="Update Password">

            </form>
            </div>
        </section>
        </div>
    </body>
</html>