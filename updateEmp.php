<?php 
	$pageTitle = "Update Employee";
	include("header.php"); 
	include("accounts.php");

		// Create connection
	$conn = mysql_connect($hostname, $username, $password);
	mysql_select_db("Supermarket");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

?>

<div class="container feature">
	<div class="content">
	SELECT * FROM EMPLOYEE
	Have Edit/Delete Buttons

	<?php $s = "SELECT * FROM DEPARTMENT"; 

		( $t = mysql_query($s) ) or die ( mysql_error() ); //Sends sql query to database
		    
		echo "<table>";

		while ( $r = mysql_fetch_assoc($t) )//getting data from sql table and displaying in html table
		{
			echo "<tr>"
		        echo   "<td>";
				echo $r["DEPARTMENT_ID"]; //this is how you retrieve information from each row
		        echo   "</td>";

		        echo   "<td>";
				echo $r["DEPARTMENT_NAME"]; //this is how you retrieve information from each row
		        echo   "</td>";
		    echo   "</tr>";
		}

		echo "</table>";
		
	 ?>
	

	</div>
</div>

<?php include("footer.php"); ?>