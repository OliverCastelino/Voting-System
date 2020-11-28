<?php
session_start();
require('Database_Connect.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['Admin_ID'])){
 header("location: Admin_Access_Denied.php");
} 
//retrive candidates from the tbcandidates table
$result=mysqli_query($con,"SELECT * FROM candidates");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
// retrieving positions sql query
$positions_retrieved=mysqli_query($con, "SELECT * FROM positions");
/*
$row = mysqli_fetch_array($positions_retrieved);
 if($row)
 {
 // get data from db
 $positions = $row['position_name'];
 }
 */
?>
<?php
// inserting sql query
if (isset($_POST['submit']))
{

$newCandidateName = addslashes( $_POST['name'] ); //prevents types of SQL injection
$newCandidatePosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

$sql = mysqli_query($con, "INSERT INTO candidates(candidate_name,candidate_position,candidate_cvotes) VALUES('$newCandidateName','$newCandidatePosition',0)" );

// redirect back to candidates
 header("Location: Admin_Manage_Candidates.php");
}
?>
<?php
// deleting sql query
// check if the 'id' variable is set in URL
 if (isset($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysqli_query($con, "DELETE FROM candidates WHERE candidate_id='$id'");
 
 // redirect back to candidates
 header("Location: Admin_Manage_Candidates.php");
 }
 else
 // do nothing   
?>
<!DOCTYPE>
<html lang="en">
    <head>
        <title>Admin Manage Candidate</title>
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
            input[name=name]
            {
                margin-left:10px;
                width:200px;
                height: 30px;
            }
            SELECT
            {
                width:200px;
                height: 35px
            }
            th
            {
                font-size: 22px;
                text-align: center;
            }
            input[name=submit]
            {
                margin-left:400px;
               width:100px; 
                height: 25px;
            }
            td
            {
                text-align: center;
                font-size: 18px;
                height: 25px
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
					<li ><a href="Admin_Home.php" >Home</a></li>
					<li><a href="Admin_Manage_position.php">Position</a></li>
					
					<li class="colorlib-active"><a href="Admin_Manage_Candidates.php">Candidate</a></li>
					<li><a href="Admin_Poll_Results.php">Results</a></li>
                    <li><a href="Admin_Poll_Report.php">Report</a></li>
                    <li><a href="Admin_Manage_Account.php">Account</a></li>
                    <li><a href="Admin_Logout.php">Logout</a></li>
				</ul>
			</nav>
        </aside>
      </div>
        <div style="background-color: antiquewhite;padding-bottom:300px">
        <header>
            <div style="margin-left:336px">
            <h1 style="color:Blue;background-color:pink;text-align:center"><b>Manage Candidate</b></h1>
            </div>
        </header>
        <section>
            <div style="margin-left:450px;margin-top:10px">
                
                <form name="fmCandidates" id="fmCandidates" action="Admin_Manage_Candidates.php" method="post" onsubmit="return candidateValidate(this)">
                    <h3 style="margin-left:-30px;color:Red">Add New Candidate:</h3><b>
                    <label style="margin-left:150px;font-size:26px">Candidate Name:</label>
                    <input type="text" name="name" style="margin-left:40px;width:200px;height:35px"><br>
                    <label style="margin-left:150px;font-size:26px">Candidate Position:</label></b>
                    <SELECT NAME="position" id="position" style="margin-left:10px;width:200px;height:35px"><h2>Select</h2>
    <OPTION VALUE="select"><h2>Select</h2>
    <?php
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions_retrieved)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]";
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
                        </OPTION>
                    </SELECT><br><br>
                    <input type="submit" name="submit" value="Add" style="margin-left:300px;width:200px;height:35px;background-color:orange"><br><br>


<table border="2px solid aqua" width="850px" align="center">
<tr>
<th class="col-sm-4" style="background-color:yellow;width:250px;"><b style="align:center">Candidate ID</b></th>
<th class="col-sm-4" style="background-color:lightblue;width:250px"><b style="align:center">Candidate Name</b></th>
<th class="col-sm-4" style="background-color:pink;width:250px"><b style="align:center">Candidate Position</b></th>
<th class="col-sm-4" style="background-color:purple;width:250px"><b style="align:center">Votes</b></th>
</tr>

<?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($result)){
    
echo "<tr>";
echo "<td>" . $inc."</td>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo '<td><a href="Admin_Manage_Candidates.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
echo "</tr>";
$inc++;
}

mysqli_free_result($result);
mysqli_close($con);
?>
</table>
                </form>
            </div>
        </section>
        </div>
    </body>
</html>