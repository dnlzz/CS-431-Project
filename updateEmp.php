<?php 
	$pageTitle = "Update Employee";
	include("header.php"); 
	include("accounts.php");

		// Create connection
	$conn = mysqli_connect($hostname, $username, $password);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

?>

<div class="container feature">
	<div class="content">
	SELECT * FROM EMPLOYEE
	Have Edit/Delete Buttons

	<?php $s = "SELECT * FROM `DEPARTMENT`"; 

		( $t = mysql_query ( $s ) ) or die ( mysql_error() ); //Sends sql query to database

		echo "<table>";

		while ( $r = mysql_fetch_array($t) )//getting data from sql table and displaying in html table
		{
		    print   "<tr>";
		        print   "<td>";
			print $r["ID"]; //this is how you retrieve information from each row
		        print   "</td>";
		        print   "<td>";
			print $r["Name"]; //this is how you retrieve information from each row
		        print   "</td>";
		        print   "<td>";
			print $r["Favorite Team"]; //this is how you retrieve information from each row
		        print   "</td>";
		        print   "<td>";
			print $r["Win/Loss"]; //this is how you retrieve information from each row
		        print   "</td>";
		    print   "</tr>";
		}
		print "</table>";
	 ?>

	</div>
</div>

<?php include("footer.php"); ?>