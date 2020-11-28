<?php
    session_start();
    require('Database_Connect.php');
    //If your session isn't valid, it returns you to the login screen for protection
    if(empty($_SESSION['Admin_ID']))
    {
        header("location:Admin_Access_Denied.php");
    }
    //retrive positions from the tbpositions table
    $result=mysqli_query($con, "SELECT * FROM Positions");
    if (mysqli_num_rows($result)<1)
    {
        $result = null;
    }
?>

<?php
    // inserting sql query
    if (isset($_POST['Submit']))
    {

        $newPosition = addslashes( $_POST['position'] ); //prevents types of SQL injection

        $sql = mysqli_query($con, "INSERT INTO Positions (position_name) VALUES ('$newPosition')");

        // redirect back to positions
        header("Location: Admin_Manage_position.php");
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
    $result = mysqli_query($con, "DELETE FROM Positions WHERE position_id='$id'");
 
    // redirect back to positions
    header("Location: Admin_Manage_position.php");
    }
    else
        // do nothing
    
?>
<!DOCTYPE>
<html lang="en">
    <head>
        <title>Admin Manage Position</title>
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
            input[type=text]
            {
                margin-left:10px;
                width:200px;
                height: 30px;
                
            }
            th
            {
                margin-left: 60px;
                font-size: 22px;
                text-align: center;
            }
            h2
            {
                margin-left:300px;
                font-size:30px
            }
            label
            {
                margin-left:200px;
                font-size: 20px
            }
            input[type=submit]
            {
                margin-left:40px;
                width:100px;
                height: 30px;
            
                background-color:  aliceblue
            }
            h3
            {
               margin-left:300px;
                font-size:30px;
                
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
					<li><a href="Admin_Home.php">Home</a></li>
					<li class="colorlib-active"><a href="Admin_Manage_position.php">Position</a></li>
					
					<li><a href="Admin_Manage_Candidates.php">Candidate</a></li>
					<li><a href="Admin_Poll_Results.php">Results</a></li>
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
            <h1 style="color:Blue;background-color:pink;text-align:center"><b>Manage Position</b></h1>
            </div>
        </header>
        <section>
            <div style="margin-left:341px;margin-top:50px">
                <h3 style="margin-left:20px;color:Red">Add New Position:</h3>
               <form name="fmPositions" id="fmPositions" action="Admin_Manage_position.php" method="post" onsubmit="return positionValidate(this)">
                   <label style="margin-left:150px;font-size:26px">Position Name:</label>
                   <input type="text" name="position" style="margin-left:40px;width:250px;height:35px">
                   <input type="submit" name="Submit" value="Add" style="margin-left:50px;width:150px;height:35px;background-color:orange"><br>
                  
                       <h3 style="margin-left:20px;color:Red">Available Positions:</h3>
                    <table border="2px solid aqua" width="850px" align="center">
                       <tr>
                           <th class="col-sm-4" style="background-color:yellow;width:250px;">Position ID</th>
                           <th class="col-sm-4" style="background-color:pink;width:250px">Position Name</th>
                           <th class="col-sm-4" style="background-color:lightblue;width:250px"><b style="align:center">Action</b></th>
                       </tr>

<?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" .$inc."</td>";
echo "<td>" . $row['position_name']."</td>";
echo '<td><a href="Admin_Manage_position.php?id=' . $row['position_id'] . '">Delete Position</a></td>';
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
    </body>
</html>