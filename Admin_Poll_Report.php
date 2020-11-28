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

$Winner1=mysqli_query($con,"SELECT candidate_name,candidate_position,candidate_cvotes FROM candidates WHERE candidate_position='Chairperson' GROUP BY candidate_position");
if (mysqli_num_rows($Winner1)<1){
    $Winner1 = null;
}
$Winner2=mysqli_query($con,"SELECT candidate_name,candidate_position,candidate_cvotes FROM candidates WHERE candidate_position='Vice-Chairperson' GROUP BY candidate_cvotes HAVING MAX(candidate_cvotes)");
if (mysqli_num_rows($Winner2)<1){
    $Winner2 = null;
}
$Winner8=mysqli_query($con,"SELECT candidate_name,candidate_position,candidate_cvotes FROM candidates WHERE candidate_position='Vice-Treasurer' GROUP BY candidate_cvotes HAVING MAX(candidate_cvotes)");
if (mysqli_num_rows($Winner8)<1){
    $Winner8 = null;
}
$Winner3=mysqli_query($con,"SELECT candidate_name,candidate_position,candidate_cvotes FROM candidates WHERE candidate_position='Secretary' GROUP BY candidate_cvotes HAVING MAX(candidate_cvotes)");
if (mysqli_num_rows($Winner3)<1){
    $Winner3 = null;
}
$Winner4=mysqli_query($con,"SELECT candidate_name,candidate_position,candidate_cvotes FROM candidates WHERE candidate_position='Vice-Secretary' GROUP BY candidate_cvotes HAVING MAX(candidate_cvotes)");
if (mysqli_num_rows($Winner4)<1){
    $Winner4 = null;
}
$Winner5=mysqli_query($con,"SELECT candidate_name,candidate_position,candidate_cvotes FROM candidates WHERE candidate_position='Organizing-Secretary' GROUP BY candidate_cvotes HAVING MAX(candidate_cvotes)");
if (mysqli_num_rows($Winner5)<1){
    $Winner5 = null;
}
$Winner6=mysqli_query($con,"SELECT candidate_name,candidate_position,candidate_cvotes FROM candidates WHERE candidate_position='Treasurer' GROUP BY candidate_cvotes HAVING MAX(candidate_cvotes)");
if (mysqli_num_rows($Winner6)<1){
    $Winner6 = null;
}
$Winner7=mysqli_query($con,"SELECT candidate_name,candidate_position,candidate_cvotes FROM candidates WHERE candidate_position='Sports-Secratory' GROUP BY candidate_cvotes HAVING MAX(candidate_cvotes)");
if (mysqli_num_rows($Winner7)<1){
    $Winner7 = null;
}

?>
<?php
// retrieving positions sql query
$positions=mysqli_query($con, "SELECT * FROM Positions");
?>

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
            td
            {
                text-align: center;
                font-size: 18px;
                height: 25px
            }
            th
            {
                font-size: 22px;
                text-align: center;
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
					<li ><a href="Admin_Poll_Results.php">Results</a></li>
                    <li class="colorlib-active"><a href="Admin_Poll_Report.php">Report</a></li>
                    <li ><a href="Admin_Manage_Account.php">Account</a></li>
                    <li><a href="Admin_Logout.php">Logout</a></li>
				</ul>
			</nav>
        </aside>
      </div>
        <div style="background-color: antiquewhite ;padding-bottom:300px">
        <header>
            <div style="margin-left:336px">
            <h1 style="color:Blue;background-color:pink;text-align:center"><b>Report</b></h1>
            </div>
        </header>
        <section>
            <div style="margin-left:341px;margin-top:50px">
            <i>
                
            
                
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
echo "<td>" . $row['candidate_cvotes']."</td>";

echo "</tr>";
$inc++;
}

mysqli_free_result($result);
mysqli_close($con);
?>
</table><br><br>
                <h3 style="margin-left:20px">Candidate Having Maximum Votes Are:</h3>
                <table border="2px solid aqua" width="850px" align="center">
<tr>

<th class="col-sm-4" style="background-color:lightblue;width:250px"><b style="align:center">Candidate Name</b></th>
<th class="col-sm-4" style="background-color:pink;width:250px"><b style="align:center">Candidate Position</b></th>
<th class="col-sm-4" style="background-color:purple;width:250px"><b style="align:center">Votes</b></th>
</tr>
                    <?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($Winner1)){
    
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo "<td>" . $row['candidate_cvotes']."</td>";

echo "</tr>";
$inc++;
}

mysqli_free_result($Winner1);
mysqli_close($con);
?>
                    </table><br><br>
                <table border="2px solid aqua" width="850px" align="center">
<tr>

<th class="col-sm-4" style="background-color:lightblue;width:250px"><b style="align:center">Candidate Name</b></th>
<th class="col-sm-4" style="background-color:pink;width:250px"><b style="align:center">Candidate Position</b></th>
<th class="col-sm-4" style="background-color:purple;width:250px"><b style="align:center">Votes</b></th>
</tr>
                    <?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($Winner2)){
    
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo "<td>" . $row['candidate_cvotes']."</td>";

echo "</tr>";
$inc++;
}

mysqli_free_result($Winner2);
mysqli_close($con);
?>
                    </table><br><br>
                <table border="2px solid aqua" width="850px" align="center">
<tr>

<th class="col-sm-4" style="background-color:lightblue;width:250px"><b style="align:center">Candidate Name</b></th>
<th class="col-sm-4" style="background-color:pink;width:250px"><b style="align:center">Candidate Position</b></th>
<th class="col-sm-4" style="background-color:purple;width:250px"><b style="align:center">Votes</b></th>
</tr>
                    <?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($Winner3)){
    
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo "<td>" . $row['candidate_cvotes']."</td>";

echo "</tr>";
$inc++;
}

mysqli_free_result($Winner3);
mysqli_close($con);
?>
                    </table><br><br>
                <table border="2px solid aqua" width="850px" align="center">
<tr>

<th class="col-sm-4" style="background-color:lightblue;width:250px"><b style="align:center">Candidate Name</b></th>
<th class="col-sm-4" style="background-color:pink;width:250px"><b style="align:center">Candidate Position</b></th>
<th class="col-sm-4" style="background-color:purple;width:250px"><b style="align:center">Votes</b></th>
</tr>
                    <?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($Winner4)){
    
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo "<td>" . $row['candidate_cvotes']."</td>";

echo "</tr>";
$inc++;
}

mysqli_free_result($Winner4);
mysqli_close($con);
?>
                    </table><br><br>
                <table border="2px solid aqua" width="850px" align="center">
<tr>

<th class="col-sm-4" style="background-color:lightblue;width:250px"><b style="align:center">Candidate Name</b></th>
<th class="col-sm-4" style="background-color:pink;width:250px"><b style="align:center">Candidate Position</b></th>
<th class="col-sm-4" style="background-color:purple;width:250px"><b style="align:center">Votes</b></th>
</tr>
                    <?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($Winner5)){
    
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo "<td>" . $row['candidate_cvotes']."</td>";

echo "</tr>";
$inc++;
}

mysqli_free_result($Winner5);
mysqli_close($con);
?>
                    </table><br><br>
                <table border="2px solid aqua" width="850px" align="center">
<tr>

<th class="col-sm-4" style="background-color:lightblue;width:250px"><b style="align:center">Candidate Name</b></th>
<th class="col-sm-4" style="background-color:pink;width:250px"><b style="align:center">Candidate Position</b></th>
<th class="col-sm-4" style="background-color:purple;width:250px"><b style="align:center">Votes</b></th>
</tr>
                    <?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($Winner6)){
    
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo "<td>" . $row['candidate_cvotes']."</td>";

echo "</tr>";
$inc++;
}

mysqli_free_result($Winner6);
mysqli_close($con);
?>
                    </table><br><br>
                <table border="2px solid aqua" width="850px" align="center">
<tr>

<th class="col-sm-4" style="background-color:lightblue;width:250px"><b style="align:center">Candidate Name</b></th>
<th class="col-sm-4" style="background-color:pink;width:250px"><b style="align:center">Candidate Position</b></th>
<th class="col-sm-4" style="background-color:purple;width:250px"><b style="align:center">Votes</b></th>
</tr>
                    <?php
//loop through all table rows
while ($row=mysqli_fetch_array($Winner7)){
    
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo "<td>" . $row['candidate_cvotes']."</td>";

echo "</tr>";
}

mysqli_free_result($Winner7);
mysqli_close($con);
?>
                    </table><br><br>
                <table border="2px solid aqua" width="850px" align="center">
<tr>

<th class="col-sm-4" style="background-color:lightblue;width:250px"><b style="align:center">Candidate Name</b></th>
<th class="col-sm-4" style="background-color:pink;width:250px"><b style="align:center">Candidate Position</b></th>
<th class="col-sm-4" style="background-color:purple;width:250px"><b style="align:center">Votes</b></th>
</tr>
                    <?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($Winner8)){
    
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo "<td>" . $row['candidate_cvotes']."</td>";

echo "</tr>";
$inc++;
}

mysqli_free_result($Winner8);
mysqli_close($con);
?>
                    </table><br><br>
                
                
                </i>
            </div>
        </section>
        </div>
    </body>
</html>