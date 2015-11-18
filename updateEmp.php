<?php 
	$pageTitle = "Update Employee";
	include("header.php"); 
	include("accounts.php")

		// Create connection
	$conn = mysqli_connect($hostname, $username, $password);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";

?>

<div class="container">
	<div class="content">
	SELECT * FROM EMPLOYEE
	Have Edit/Delete Buttons

	<?php 

		$s = "select * from Employee;"
	?>

<!--
		( $t = mysql_query ( $s ) ) or die ( mysql_error() ); //Sends sql query to database
print "<br>Rows are: " . mysql_num_rows ($t) . "<br>" ; //php function for number of rows
print "<table border=2px> \n\r"; //setting up a table
print "<tr> <td>ID</td> <td>Name</td> <td>Favorite Team</td> <td>Win/Loss</td>";
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
-->
	</div>
</div>

<?php include("footer.php"); ?>