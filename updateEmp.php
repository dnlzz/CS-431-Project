<?php 
	$pageTitle = "Update Employee";
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
	<h1>Employees</h1>

	<?php $s = "SELECT * FROM EMPLOYEE"; 

		( $t = mysql_query($s) ) or die ( mysql_error() ); //Sends sql query to database
		    
		$numCols = mysql_num_fields($t);

		echo "<table class=\"table table-wrapper\">";

		
		while ( $row = mysql_fetch_assoc($t) )
		{

			echo "<tr>";

		        echo   "<td>" . $row["Employee_last_name"] . ", " . $row["Employee_first_name"] . "</td>";
		        echo   "<td>" . $row["Employee_street_name"] . " " . $row["Employee_city"] . ", " . $row["Employee_state"] . "</td>";
				echo   "<td>" .  "<p><a class=\"btn btn-default\" href=\"#\" role=\"button\">Edit</a></p>" . "</td>";		
				echo   "<td>" .  "<p><a class=\"btn btn-danger\" href=\"#\" role=\"button\">Remove</a></p>" . "</td>";		

			echo   "</tr>";
		}

		echo "</table>";
		
	 ?>
	
	</div>
</div>

<?php include("footer.php"); ?>