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
        $fullName = $row['Full_Name'];
        $email = $row['Email'];
        $phonenumber = $row['Phone_Number'];
    }
?>

<?php
    // updating sql query
    if (isset($_POST['update']))
    {
        $myId = addslashes( $_GET['id']);
        $myFullName = addslashes( $_POST['fullname'] ); //prevents types of SQL injection
        $myEmail = $_POST['email']; //prevents types of SQL injection
        $myPhonenumber = $_POST['phonenumber'];

        $sql = mysqli_query($con,"UPDATE Members SET Full_Name='$myFullName', Email='$myEmail', Phone_Number='$myPhonenumber' WHERE Member_ID = '$myId'" );

// redirect back to profile
        header("Location: Student_Profile.php");
    }
?>
<!DOCTYPE>
<html lang="en">
    <head>
        <title>Student Profile</title>
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
			<h1 id="colorlib-logo" class="mb-4"><a href="Student_Home.php">V-SYS</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li ><a href="Student_Home.php">Home</a></li>
					<li><a href="Student_Poll.php">Vote</a></li>
                    <li><a href="Student_View_Result.php">Results</a>
					<li class="colorlib-active"><a href="Student_Profile.php">Account</a></li>
					<li><a href="Student_Change_Password.php">Change Password</a></li>
					
                    
                    <li><a href="Student_Logout.php">Logout</a></li>
				</ul>
			</nav>
        </aside>
      </div>
        <div style="background-color: antiquewhite ;padding-bottom:300px">
        <header>
            <div style="margin-left:336px">
            <h1 style="color:Blue;background-color:pink;text-align:center"><b>Mange Account</b></h1>
            </div>
        </header>
        <section>
            <div style="margin-left:350px;margin-top:50px">
                
                <form action="Student_Profile.php?id=<?php echo $_SESSION['Member_ID']; ?>" method="post" onsubmit="return updateProfile(this)">
                    <lable name="l1">Full Name:</lable>
                <input type="text" style="background-color:white; font-weight:bold;" name="fullname" maxlength="20" value="<?php echo $fullName ?>"><br><br>
        <lable name="l2">Email :</lable>
        <input type="text" style="background-color:white; font-weight:bold;" name="email" maxlength="40" value="<?php echo $email ?>"><br><br>
        <lable name="l3">Phone Number:</lable>
        <input type="text" style="background-color:white; font-weight:bold;" name="phonenumber" maxlength="100" value="<?php echo $phonenumber?>"><br><br>
        <input type="submit" name="update" value="Update Account">
                </form>
            </div>
        </section>
        </div>
    </body>
</html>
                    