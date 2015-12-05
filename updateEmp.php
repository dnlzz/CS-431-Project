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

		$s = "SELECT * FROM EMPLOYEE e, DEPARTMENT d
			  WHERE e.Department_ID = d.Department_ID"; 

	  	//added here
			  if ($_GET['sort'] == 'name') {
			  	$s = $s . " ORDER BY e.Employee_last_name";
			  }

  			  if ($_GET['sort'] == 'dob') {
			  	$s = $s . " ORDER BY e.Employee_date_of_birth";
			  }

  			  if ($_GET['sort'] == 'street') {
			  	$s = $s . " ORDER BY e.Employee_street_name";
			  }

  			  if ($_GET['sort'] == 'city') {
			  	$s = $s . " ORDER BY e.Employee_city";
			  }

  			  if ($_GET['sort'] == 'state') {
			  	$s = $s . " ORDER BY e.Employee_state";
			  }

  			  if ($_GET['sort'] == 'salary') {
			  	$s = $s . " ORDER BY e.Employee_salary";
			  }

  			  if ($_GET['sort'] == 'dept') {
			  	$s = $s . " ORDER BY d.Department_name";
			  }

		( $t = mysql_query($s) ) or die ( mysql_error() ); //Sends sql query to database

	?>
		<div class="container">
		<table class="table table-wrapper" colspan="0">

		<tr>
			<th><a href="updateEmp.php?sort=name">Name</a></th>
			<th><a href="updateEmp.php?sort=dob">Birth Date</a></th>
			<th><a href="updateEmp.php?sort=street">Street</a></th>
			<th><a href="updateEmp.php?sort=city">City</a></th>
			<th><a href="updateEmp.php?sort=state">State</a></th>
			<th><a href="updateEmp.php?sort=salary">Salary</a></th>
			<th><a href="updateEmp.php?sort=dept">Department</a></th>
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
  		$department = $row['Department_name'];

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
                	<a class="btn btn-default" name = "update" href="editEmployee.php?id=<?php echo $id; ?>">Edit</a>
                </td>
            	
                <td>
                	<a class="btn btn-danger" name="delete" href="deleteEmp.php?id=<?php echo $id; ?>">Delete</a>
                </td>          	
             </tr>
        </form> 

    <?php endwhile ; ?>
	
      	</table>
	</div>
	</div>
</div>

<?php include("footer.php"); ?>