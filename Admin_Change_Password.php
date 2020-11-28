<?php
session_start();
require('../Database_Connect.php');
?>
<!DOCTYPE>
<html>
    <head>
        <title>Admin Home</title>
        <link href="css/Admin_home.css" rel="stylesheet" type="text/css">
        <script language="JavaScript" src="js/Admin.js"></script>
        <style>
            h4
            {
               margin-left: 280px;
                font-size: 25px; 
            }
            lable[name=l1]
            {
                font-size: 25px;
                margin-left: 210px
            }
            input[name=oldpass]
            {
                font-size: 20px;
                margin-left: 50px
            }
            lable[name=l2]
            {
                font-size: 25px;
                margin-left: 210px
            }
            input[name=newpass]
            {
                font-size: 20px;
                margin-left: 48px
            }
            lable[name=l3]
            {
                font-size: 25px;
                margin-left: 210px
            }
            input[name=confpass]
            {
                font-size: 20px;
                margin-left: 10px
            }
            input[name=update]
            {
                font-size: 20px;
                margin-left: 320px;
                margin-top:10px;
                background-color: antiquewhite
            }
        </style>
    </head>
    <body background="images/div.jpg">
        <nav class="navcls">
        <div id="profile">
            <img id=pr_pic src="images/div.jpg">
            <br><br><b id="welcome"><a href="Admin_Home.php">Home </a></b><br><br>
                   
            <b id="mngcandi"><a href="Admin_Manage_Candidates.php">Manage Candidates</a></b><br><br>
            <b id="mngpos"><a href="Admin_Manage_position.php">Manage Posistion</a></b><br><br>
            <b id="pollreslt"><a href="Admin_Poll_Results.php">Poll Result</a></b><br><br>
            <b id="mngaccnt"><a href="Admin_Manage_Account.php">Manage Account</a></b><br><br>
            <b id="chngpasswd"><a href="Admin_Change_Password.php">Change Password</a></b><br><br>
            <b id="logout"><a href="Admin_Logout.php">Log Out</a></b>
        </div>
        </nav>
        <header>
            <div id="Heading">
            <h1>Change Admin Password</h1>
            </div>
        </header>
        <section>
        <div id="section">
            <?php
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['Admin_ID'])){
 header("location:Admin_Access_Denied.php");
}

//fetch data for update file
$result=mysqli_query($con, "SELECT * FROM Administrators WHERE Admin_ID = '$_SESSION[Admin_ID]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $encPass = $row['Password'];
 }

//Process
if (isset($_GET['id']) && isset($_POST['update']))
{
    $myId = addslashes( $_GET['id']);
    $mypassword = md5($_POST['oldpass']);
    $newpass= $_POST['newpass'];
    $confpass= $_POST['confpass'];
    if($encPass==$mypassword)
    {
        if($newpass==$confpass)
        {
        $newpass = md5($newpass); //This will make your password encrypted into md5, a high security hash
        $sql = mysqli_query($con, "UPDATE Administrators SET Password='$newpass' WHERE Admin_ID = '$myId'" );
        echo "<script>alert('Your password updated');</script>";
        }
        else
        {
            echo "<script>alert('Your new pass and confirm pass not match');</script>";
        }    
    }
    else
    {
        echo "<script>alert('Your old pass not match');</script>";
    }
    
}
?>
<form action="Admin_Change_Password.php?id=<?php echo $_SESSION['Admin_ID']; ?>" method="post" onSubmit="return updateValidate(this)">
    <h4>CHANGE PASSWORD</h4>
    <lable name="l1">Old Password:</lable>
    <input type="password" style="background-color:#999999; font-weight:bold;" name="oldpass" maxlength="15" value=""><br><br>
    <lable name="l2">New Password</lable>
    <input type="password" style="background-color:#999999; font-weight:bold;" name="newpass" maxlength="15" value=""><br><br>
    <lable name="l3">Confirm Password</lable>
    <input type="password" style="background-color:#999999; font-weight:bold;" name="confpass" maxlength="15" value=""><br><br>
    <input type="submit" name="update" value="Update Account">
            </form>
            </div>
        </section>
    </body>
</html>
    
