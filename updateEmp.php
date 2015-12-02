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

	<h3><?php echo $success; ?></h3>

	<?php 

		$s = "SELECT * FROM EMPLOYEE"; 

		( $t = mysql_query($s) ) or die ( mysql_error() ); //Sends sql query to database

	?>

		<table class="table table-wrapper" colspan="0">
		<tr>
			<th>Name</th>
			<th>Birth Date</th>
			<th>Street</th>
			<th>City</th>
			<th>State</th>
			<th>Salary</th>
			<th>Department</th>
		</tr>

	<?php
	
	while ( $row = mysql_fetch_assoc($t) ) :
  		$id = $row['Employee_ID'];
  		$firstName = $row['Employee_first_name'];
  		$lastName = $row['Employee_last_name'];
  		$salary = $row['Employee_salary'];
  		$dob = $row['Employee_date_of_birth'];
  		$phone = $row['Employee_phone'];
  		$street= $row['Employee_street_name'];
  		$city= $row['Employee_city'];
  		$state = $row['Employee_state'];
  		$department = $row['Department_ID'];

	?>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
             <tr>
				<td>
					<?php echo $lastName . ", " . $firstName; ?>
				</td>
				<td>
					<?php echo $dob; ?>
				</td>
				<td>
					<?php echo $street; ?>
				</td>
				<td>
					<?php echo $city; ?>
				</td> 
				<td>
					<?php echo $state; ?>
				</td>  
				<td>
					<?php echo $salary; ?>
				</td> 
				<td>
					<?php echo $department; ?>
				</td>                     	
                <td>
                	<a class="btn btn-default" name = "update" href="edit.php?id=<?php echo $id; ?>">Edit</a>
                </td>
            	
                <td>
                	<input type="hidden" name="<?php echo $id; ?>">
                	<input type="Submit" value="Remove" class="btn btn-danger" name="delRec" id="delRec">
                </td>
             </tr>
        </form> 


    <?php endwhile ; ?>

      	</table>

	</div>
</div>

<?php 
	
	if (isset($_POST['delRec'])) {
		header("Location: index.php");
	}

 ?>

<?php include("footer.php"); ?>