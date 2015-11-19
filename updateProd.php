<?php 
	$pageTitle = "Update Product";
	include("header.php"); 
	include("accounts.php");

		// Create connection
	$conn = mysql_connect($hostname, $username, $password);
	$db = mysql_select_db("Supermarket");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

?>

<div class="container-fluid feature">
	<div class="content">

	<h1>Products</h1>

	<?php $s = "SELECT * FROM PRODUCT"; 

		( $t = mysql_query($s) ) or die ( mysql_error() ); //Sends sql query to database
		    
		$numCols = mysql_num_fields($t);

		echo "<table class=\"table table-wrapper\">";

		while ( $row = mysql_fetch_assoc($t) )
		{

			echo "<tr>";

		        echo "<td>" . $row["Product_name"] . "</td>";
		        echo "<td>" . $row["Product_price"] . "</td>";
		        echo   "<td>" .  "<p><a class=\"btn btn-default\" href=\"#\" role=\"button\">Edit</a></p>" . "</td>";		
				echo   "<td>" .  "<p><a class=\"btn btn-danger\" href=\"#\" role=\"button\">Remove</a></p>" . "</td>";	

			echo   "</tr>";
		}
		echo "</table>";
		
	 ?>
	

	</div>
</div>

<?php include("footer.php"); ?>