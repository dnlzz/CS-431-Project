<?php

	$pageTitle = "Delete Product";
	include("header.php"); 
	include("accounts.php");

		// Create connection
	$conn = mysql_connect($hostname, $username, $password);
	$db = mysql_select_db("Supermarket");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

if(isset($_POST['Product_ID']))
{
	$id=$_POST['Product_ID'];
	$query = mysql_query("DELETE FROM PRODUCT where Product_ID = '$id'");
	
	if($query)
	{
			echo "DELETED";
	}
}

?>


<?php include("footer.php"); ?>