<?php
    require('Database_Connect.php');
    session_start();
    //If your session isn't valid, it returns you to the login screen for protection
    if(empty($_SESSION['Member_ID']))
    {
    header("location: Student_Access_Denied.php");
    }
?>
<?php
    // retrieving positions sql query
    $positions=mysqli_query($con, "SELECT * FROM Positions");
?> 
<?php
    // retrieval sql query
    // check if Submit is set in POST
    if (isset($_POST['Submit']))
    {
        // get position value
        $position = addslashes( $_POST['position'] ); //prevents types of SQL injection
 
        // retrieve based on position
        $result = mysqli_query($con,"SELECT * FROM Candidates WHERE candidate_position='$position'");
        // redirect back to vote
        //header("Location: vote.php");
    }
    else
        // do something
  
?>


<!DOCTYPE>
<html lang="en">
    <head>
        <title>Student Poll</title>
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
        <script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	if(confirm("Your vote is for "+int))
	{
  var pos=document.getElementById("str").value;
  var id=document.getElementById("hidden").value;
  xmlhttp.open("GET","Student_Save.php?vote="+int+"&user_id="+id+"&position="+pos,true);
  xmlhttp.send();

  xmlhttp.onreadystatechange =function()
{
	if(xmlhttp.readyState ==4 && xmlhttp.status==200)
	{
  //  alert("dfdfd");
	document.getElementById("error").innerHTML=xmlhttp.responseText;
	}
}

  }
	else
	{
	alert("Choose another candidate ");
	}
	
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","Student_Poll.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "Admin_Poll_Results.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>
        <style>
        label[name=lb1]
            {
                margin-left: 200px;
                
                font-size: 25px;
                
            }
            SELECT
            {
                margin-left:10px;
                width:200px;
                height: 30px
            }
            input[type=submit]
            {
                margin-left:10px;
                width:150px;
                height: 30px;
                background-color: orangered
            
                
            }
            h2
            {
                margin-top: 30px;
                margin-left: 200px;
                font-size: 28px;
                color: red
                
            }
            input[type=radio]
            {
                margin-left: 150px;
                width:40px
            }
            i
            {
                margin-left: 260px;
                font-size:20px
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
					<li class="colorlib-active"><a href="Student_Poll.php">Vote</a></li>
                    <li><a href="Student_View_Result.php">Results</a>
					<li ><a href="Student_Profile.php">Account</a></li>
					<li><a href="Student_Change_Password.php">Change Password</a></li>
					
                    
                    <li><a href="Student_Logout.php">Logout</a></li>
				</ul>
			</nav>
        </aside>
      </div>
        <div style="background-color: antiquewhite ;padding-bottom:300px">
        <header>
            <div style="margin-left:336px">
            <h1 style="color:Blue;background-color:pink;text-align:center"><b>Vote</b></h1>
            </div>
        </header>
        <section>
            <div style="margin-left:350px;margin-top:50px">
                <form name="fmNames" id="fmNames" method="post" action="Student_Poll.php" onSubmit="return positionValidate(this)">
                
                    <label name="lb1"><b>Choose Position:</b></label>
                    <SELECT NAME="position" id="position" onclick="getPosition(this.value)">
                    <OPTION VALUE="select">Select
                        <?php 
                            //loop through all table rows
                            while ($row=mysqli_fetch_array($positions))
                            {
                                    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
                        //mysql_free_result($positions_retrieved);
                //mysql_close($link);
                            }
                        ?>
                        </OPTION>
                    </SELECT>
                <input type="hidden" id="hidden" value="<?php echo $_SESSION['Member_ID']; ?>" />
                <input type="hidden" id="str" value="<?php echo $_REQUEST['position']; ?>" />
                <input type="submit" name="Submit" value="See Candidates" />    
                </form>
                <br>
                <h3><marquee behavior="left">Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective position. This process can not be undone so think wisely before casting your vote.</marquee></h3>
                <h2>Candidates:</h2>
                <?php
                //loop through all table rows
                //if (mysql_num_rows($result)>0){
                if (isset($_POST['Submit']))
                {
                        while ($row=mysqli_fetch_array($result))
                        {
                        
                            echo "<i>" . $row['candidate_name']."</i>";
                            echo "<input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /><br> <br>";
                        
                        }
                    mysqli_free_result($result);
                    mysqli_close($con);
                    //}
                }
                else
                    // do nothing
                ?>
                <span id="error"></span>
            </div>
        </section>
        </div>
    </body>
</html>