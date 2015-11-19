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

<div class="container feature">
	<div class="content">
	SELECT * FROM EMPLOYEE
	Have Edit/Delete Buttons

	<?php $s = "SELECT * FROM EMPLOYEE"; 

		( $t = mysql_query($s) ) or die ( mysql_error() ); //Sends sql query to database
		    
		$numCols = mysql_num_fields($t);

		echo "<table class=\"table\">";

		#ADD HEADERS

		while ( $row = mysql_fetch_array($t) )//getting data from sql table and displaying in html table
		{

			echo "<tr>";

			for ($col = 0; $col < $numCols; $col++) {

		        echo   "<td>";
				echo $row[$col]; //this is how you retrieve information from each row
		        echo   "</td>";
		    
			}
			
			##ADD EDIT/REMIOVE BUTTONS

			echo   "</tr>";

		}

		echo "</table>";
		
	 ?>
	

	</div>
</div>

<?php include("footer.php"); ?>