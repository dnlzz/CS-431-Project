<?php

	$pageTitle = "Edit";
	include("header.php"); 
	include("accounts.php");

		// Create connection
	$conn = mysql_connect($hostname, $username, $password);
	$db = mysql_select_db("Supermarket");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	if (!isset($_POST['id'])) {
		$UID = $_GET['id'];
		$sql = "SELECT * FROM EMPLOYEE WHERE EMPLOYEE_ID = '$UID'";
		$query = mysql_query($sql) or die(mysql_error());
	}


	if(mysql_num_rows($query)>=1){
	    while($row = mysql_fetch_array($query)) {
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
	    }
?>

<div class="container-fluid feature" id="addEmployeeDiv">
	<div class="content">

	<h3>Edit Employee</h3>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

		<input type="hidden" name="ID" value="<?=$UID;?>">


		  <div class="form-group">
	    	<label for="firstName">First Name</label>
	    	<input type="text" class="form-control" name="ud_firstName" value="<?php echo $firstName; ?>">
		  	
		  </div>

		  <div class="form-group">
	    	<label for="lastName">Last Name</label>
	    	<input type="text" class="form-control" name="ud_lastName" value="<?php echo $lastName; ?>">
		  </div>

  		  <div class="form-group">
	    	<label for="phNum">Phone Number</label>
	    	<input type="text" class="form-control" name="ud_phNum" value="<?php echo $phone; ?>">
		  </div>

  		  <div class="form-group">
	    	<label for="address">Street Address</label>
	    	<input type="text" class="form-control" name="ud_address" value="<?php echo $street; ?>">
		  </div>

		  <div class="form-group">
	    	<label for="city">City</label>
	    	<input type="text" class="form-control" name="ud_city" value="<?php echo $city; ?>">
		  </div>

		  <div class="form-group">
	    	<label for="state">State</label>
	    	<input type="text" class="form-control" name="ud_state" value="<?php echo $state; ?>">
		  </div>

		  <div class="form-group">
	    	<label for="dob">Date of Birth</label>
	    	<input type="text" class="form-control" name="ud_dob" value="<?php echo $dob; ?>">
		  </div>

		  <div class="form-group">
	    	<label for="salary">Salary</label>
	    	<input type="text" class="form-control" name="ud_salary" value="<?php echo $salary; ?>">
		  </div>

		  <div class="form-group">
	    	<label for="department">Department (select one)</label><br>
				<select class="form-control" name="ud_department">

			<option value="0">Select Department...</option>

		<?php 	

			$sql = "SELECT * FROM DEPARTMENT
					ORDER BY Department_name";

			$result = ( mysql_query($sql) ) or die( mysql_error() );

		while ($row = mysql_fetch_assoc($result)) {
			$dID = $row['Department_ID'];
			$dName = $row['Department_name'];
		?>
		
	    <option value="<?php echo $dID; ?>" <?php if ($department == $dID) echo 'selected="selected"'; ?> ><?php echo $dName; ?></option>
	
	<?php } ?>

	  	</select>
	  	</div>
<!--
		  <div class="form-group">
	    	<label for="department">Department (select one)</label><br>
				<select class="form-control" name="ud_department">
				    <option value="1" <?php if ($department == 1) echo 'selected="selected"'; ?> >Produce</option>
				    <option value="2" <?php if ($department == 2) echo 'selected="selected"'; ?> >Meat</option>
				    <option value="3" <?php if ($department == 3) echo 'selected="selected"'; ?> >Seafood</option>
				    <option value="4" <?php if ($department == 4) echo 'selected="selected"'; ?> >Bakery</option>
				    <option value="5" <?php if ($department == 5) echo 'selected="selected"'; ?> >Deli</option>
				    <option value="6" <?php if ($department == 6) echo 'selected="selected"'; ?> >Pharmacy</option>
				    <option value="7" <?php if ($department == 7) echo 'selected="selected"'; ?> >Specialty</option>
				    <option value="8" <?php if ($department == 8) echo 'selected="selected"'; ?> >Frozen</option>
			  	</select>		
		  </div>
  -->
		<br>
		<input type="Submit" value="Update" class="btn btn-success" name="upSubmit">
		<input type="Submit" value="Cancel" class="btn btn-default" name="cancel">
	</form>

<?php } ?>


	</div>
</div>


<?php 

	if (isset($_POST['upSubmit'])) {
		$uSQL = "UPDATE EMPLOYEE SET Employee_first_name='$_POST[ud_firstName]', Employee_last_name='$_POST[ud_lastName]', Employee_salary='$_POST[ud_salary]', Employee_date_of_birth='$_POST[ud_dob]', Employee_phone='$_POST[ud_phNum]', Employee_street_name='$_POST[ud_address]', Employee_city='$_POST[ud_city]', Employee_state='$_POST[ud_state]', Department_ID='$_POST[ud_department]' WHERE Employee_ID = '$_POST[ID]'";
		mysql_query($uSQL) or die(mysql_error());
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Employee Info Updated!')
			window.location.href='./updateEmp.php';
			</SCRIPT>");		
	}

	if (isset($_POST['cancel'])) {
		header("Location: updateEmp.php");
	}

 ?>


<?php include("footer.php"); ?>