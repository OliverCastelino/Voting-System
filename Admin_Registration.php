<!DOCTYPE html>
<html>
    <head>
        <title>Admin Registration</title>
        <link href="css/Admin_Registration.css" rel="stylesheet" type="text/css">
        <script language="JavaScript" src="js/Admin.js"></script>
    </head>
    <body>
        <div id="register">
             <?php
    require('Database_Connect.php');
    //Process
    if (isset($_POST['register']))    
    {
        $Fullname = $_POST['fullname']; //prevents types of SQL injection
        $Email = $_POST['email'];
        $Phonenumber=$_POST['phonenumber'];
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $Cnfpassword = md5($Password); //This will make your password encrypted into md5, a high security hash

        $sql = mysqli_query($con, "INSERT INTO Administrators(Full_Name, Email, Phone_Number, User_Name, Password) VALUES('$Fullname','$Email', '$Phonenumber', '$Username', '$Cnfpassword') ");

        die( "<h2>You have registered for an  Admin account</h2><br><br>Go to<t></t> <a href=\"Admin_Login.php\">Login</a>" );
    }
    ?>
            <b>
            <h2>Admin Registration</h2><br><br>
            <form action="Admin_Registration.php" method="post" onsubmit="return registerValidate(this)">
                <label id="lb1">Name:</label><br><br>
                <input id="name" name="fullname" placeholder="FullName" type="text"><br><br>
                <label id="lb2">Email:</label><br><br>
                <input id="email" name="email" placeholder="Email" type="text"><br><br>
                <label id="lb3">Phone Number:</label><br><br>
                <input id="mob_num" name="phonenumber" placeholder="Phone Number" type="text"><br><br>
                <label id="lb5">User Name:</label><br><br>
                <input id="username" name="username" placeholder="UserName" type="text">
                <span id='result' style='color:red;'></span><br><br>
                <label id="lb6">Password :</label><br><br>
                <input id="password" name="password" placeholder="Password" type="password"><br><br>
                <label id="lb4">Confirm Password :</label><br><br>
                <input id="password" name="confirmpassword" placeholder="Password" type="password"><br><br>
                <br><br>
                <input name="register" type="submit" value=" Register "><br><br><br>
                <i>Already have an account?</i> <a href='Admin_Login.php'><b>  Login Here</b></a><br><br>
                <i>----> Go back to Home</i><b><a href="Home.php">  Click Here  </a></b>
            </form>
                </b>
        </div>
    </body>
    <script src="js/jquery-1.2.6.min.js"></script>
    <script>
        $(document).ready(function(){
      
        $('#email').blur(function(event){
         
            event.preventDefault();
            var emailId=$('#email').val();
                                $.ajax({                     
                            url:'Admin_Check_User.php',
                            method:'post',
                            data:{email:emailId},  
                            dataType:'html',
                            success:function(message)
                            {
                            $('#result').html(message);
                            }
                      });
                    
           

        });

    });
   
    </script>
</html>