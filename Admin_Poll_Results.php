<?php
    require('Database_connect.php');
// retrieving candidate(s) results based on position
    if (isset($_POST['Submit'])){   
/*
$resulta = mysqli_query($con, "SELECT * FROM tbCandidates where candidate_name='Luis Nani'");

while($row1 = mysqli_fetch_array($resulta))
  {
  $candidate_1=$row1['candidate_cvotes'];
  }
  */
    $position = addslashes( $_POST['position'] );
  
    $results = mysqli_query($con, "SELECT * FROM Candidates where candidate_position='$position'");

    $row1 = mysqli_fetch_array($results); // for the first candidate
    $row2 = mysqli_fetch_array($results); // for the second candidate
      if ($row1){
      $candidate_name_1=$row1['candidate_name']; // first candidate name
      $candidate_1=$row1['candidate_cvotes']; // first candidate votes
      }

      if ($row2){
      $candidate_name_2=$row2['candidate_name']; // second candidate name
      $candidate_2=$row2['candidate_cvotes']; // second candidate votes
      }
}
    else
        // do nothing
?> 
<?php
// retrieving positions sql query
$positions=mysqli_query($con, "SELECT * FROM Positions");
?>
<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['Admin_ID'])){
 header("location:Admin_Access_Denied.php");
}
?>

<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2;} ?>
<!DOCTYPE>
<html lang="en">
    <head>
        <title>Admin Poll Results</title>
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
            
            SELECT
            {
                margin-left:10px;
                height: 30px;
                width: 200px
            }
            input[type=submit]
            {
               margin-left:10px;
                height: 30px;
                width: 100px;
                background-color: antiquewhite
            }
            i
            {
                font-size:20px
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
					<li ><a href="Admin_Manage_position.php">Position</a></li>
					
					<li><a href="Admin_Manage_Candidates.php">Candidate</a></li>
					<li class="colorlib-active"><a href="Admin_Poll_Results.php">Results</a></li>
                    <li><a href="Admin_Poll_Report.php">Report</a></li>
                    <li ><a href="Admin_Manage_Account.php">Account</a></li>
                    <li><a href="Admin_Logout.php">Logout</a></li>
				</ul>
			</nav>
        </aside>
      </div>
        <div style="background-color: antiquewhite ;padding-bottom:300px">
        <header>
            <div style="margin-left:336px">
            <h1 style="color:Blue;background-color:pink;text-align:center"><b>Results</b></h1>
            </div>
        </header>
        <section>
            <div style="margin-left:341px;margin-top:50px">
                <form name="fmNames" id="fmNames" method="post" action="Admin_Poll_Results.php" onSubmit="return positionValidate(this)">
                    <br>
                    <label style="margin-left:150px;font-size:26px">Choose Position:</label>
                    <SELECT NAME="position" id="position"
                            style="margin-left:10px;width:250px;height:35px">
    <OPTION VALUE="select">Select
    <?php 
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
                        </OPTION>
    </SELECT>
                    <input type="submit" name="Submit" value="See Results" style="margin-left:50px;width:200px;height:35px;background-color:orange">
                </form><i>
            
                <i style="margin-left:200px"><?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>:</i><br>
<img src="images/candidate-1.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>'
height='20' style="margin-left:200px">
<i style="margin-left:20px">
    <?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes</i>
                <br><i style="margin-left:200px">votes <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?></i>
<br>
<br>

                <i style="margin-left:200px"><?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>:</i><br>
<img src="images/candidate-2.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>' height='20' style="margin-left:200px">
<i style="margin-left:20px">
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes</i>
                <br><i style="margin-left:200px">votes <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?></i>
                </i>
            </div>
        </section>
        </div>
    </body>
</html>