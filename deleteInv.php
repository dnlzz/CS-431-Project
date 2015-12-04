<?php

	$pageTitle = "Delete Inventory Item";
	include("header.php"); 
	include("accounts.php");

		// Create connection
	$conn = mysql_connect($hostname, $username, $password);
	$db = mysql_select_db("Supermarket");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

if(isset($_GET['pid']) && isset($_GET['wid']))
{
	$pid=$_GET['pid'];
	$wid=$_GET['wid'];
	$query = mysql_query("DELETE FROM INVENTORY where Product_ID = '$pid'
							AND Warehouse_ID = '$wid'");
	header("Location: inventory.php");
}

?>


<?php include("footer.php"); ?>