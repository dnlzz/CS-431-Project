<!DOCTYPE html>

<?php 
	$conn = mysql_connect("localhost", "root", "apple");
	$db = mysql_select_db("Stocks"); 

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
 ?>


<html>
<head>
	<title>Stocks</title>

	<style>
		table, td, th {
		    border: 1px solid black;
		}

		td {
		    padding: 5px;
		}
	</style>

</head>
<body>
	<?php 

		$tables = mysql_query("show tables");
		$rows = mysql_fetch_array($tables);
		$table = $rows[0];
		echo "<h1>Table: $table</h1>";
		$cmd = "SELECT * FROM $table";
		$result = mysql_query($cmd);
		$ncols = mysql_num_fields($result);

		function display_header($result, $ncols) {

			echo "<tr>";

			for ($col=0; $col < $ncols; $col++) { 
				$fieldNames = mysql_field_name($result, $col);
				echo "<th>" . $fieldNames . "</th>";
			}

			echo "</tr>";
		}

		function display_body($result, $ncols) {
			while ( $row = mysql_fetch_array($result) )
			{
				echo "<tr>";

				for ($col=0; $col < $ncols; $col++) { 
					echo   "<td>" . $row[$col] . "</td>";
				}

				echo   "</tr>";
			}
		}

		function display_table($result, $ncols) {
			echo "<table>";

				display_header($result, $ncols);
				display_body($result, $ncols);
			
			echo "</table>";	
		}

		display_table($result, $ncols);

	 ?>
</body>
</html>