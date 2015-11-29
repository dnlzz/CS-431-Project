<?php 
	$pageTitle = "Add Employee";
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


		<div class="container-fluid" id="addEmployeeDiv">
			<div class="content">

	<?php
			// define variables and set to empty values
			$firstNameErr = $lastNameErr = $phNumErr = $streetErr = $cityErr = $stateErr = $dobErr = $salaryErr = "";
			$firstName = $lastName = $phNum = $street = $city = $state = $dob = $salary = "";
			$success = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {

			   	if (empty($_POST["firstName"])) {
			    	$firstNameErr = "First name is required";
			   	} else {
			    	$firstName = test_input($_POST["firstName"]);
			     	// check if name only contains letters and whitespace
			    	if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
			    		$firstNameErr = "Only letters and white space allowed"; 
					}
		   		}
			
			   	if (empty($_POST["lastName"])) {
			    	$lastNameErr = "Last name is required";
			   	} else {
			    	$lastName = test_input($_POST["lastName"]);
			     	// check if name only contains letters and whitespace
			    	if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
			    		$lastNameErr = "Only letters and white space allowed"; 
					}
		   		}

			   	if (empty($_POST["phNum"])) {
			    	$phNumErr = "Phone number is required";
			   	} else {
			    	$phNum = test_input($_POST["phNum"]);
			     	// check if name only contains letters and whitespace
			    	if (!preg_match("/^[0-9- ]*$/",$phNum)) {
			    		$phNumErr = "Only numbers and dashes allowed"; 
					}
		   		}

			   	if (empty($_POST["address"])) {
			    	$streetErr = "Address is required";
			   	} else {
			    	$street = test_input($_POST["address"]);
			     	// check if name only contains letters and whitespace
			    	if (!preg_match("/^[0-9a-zA-Z ]*$/",$address)) {
			    		$streetErr = "Only numbers, letters and white space allowed"; 
					}
		   		}

			   	if (empty($_POST["city"])) {
			    	$cityErr = "City is required";
			   	} else {
			    	$city = test_input($_POST["city"]);
			     	// check if name only contains letters and whitespace
			    	if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
			    		$cityErr = "Only letters and white space allowed"; 
					}
		   		}

			   	if (empty($_POST["state"])) {
			    	$stateErr = "State is required";
			   	} else {
			    	$state = test_input($_POST["state"]);
		   		}

 
			   	if (empty($_POST["dob"])) {
			    	$dob = "";
			   	} else {
			    	$dob = test_input($_POST["dob"]);
			    }

 
			    if (empty($_POST["salary"])) {
			    	$salary = "";
			   	} else {
			    	$salary = test_input($_POST["salary"]);
			    }

			    if ( (!empty($_POST["firstName"])) && (!empty($_POST["lastName"])) && (!empty($_POST["phNum"])) && (!empty($_POST["address"]))
			    		&& (!empty($_POST["city"])) && (!empty($_POST["state"])) ) 
			    {
			    	$sql = "INSERT INTO EMPLOYEE (Employee_first_name, Employee_last_name, Employee_salary, Employee_date_of_birth, Employee_phone, Employee_street_name, Employee_city, Employee_state) VALUES ('$firstName', '$lastName', '$salary', '$dob', '$phNum', '$street', '$city', '$state')";
			    	if ( $result = mysql_query($sql) ) {
			    		$success = "Employee added!";	
			    	} else {
			    		echo "ERROR ADDING EMPLOYEE";
		    		}
			    	
			    }

			}

			function test_input($data) {
			   $data = trim($data);
			   $data = stripslashes($data);
			   $data = htmlspecialchars($data);
			   return $data;
			}

		?>

		<h3><?php echo $success; ?></h3>

		<h5>* Field is Required</h5>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <div class="form-group">
	    	<label for="firstName">First Name  <span class="error">* <?php echo $firstNameErr;?></span></label>
	    	<input type="text" class="form-control" name="firstName" placeholder="First Name">
		  	
		  </div>

		  <div class="form-group">
	    	<label for="lastName">Last Name  <span class="error">* <?php echo $lastNameErr;?></span></label>
	    	<input type="text" class="form-control" name="lastName" placeholder="Last Name">
		  </div>

  		  <div class="form-group">
	    	<label for="phNum">Phone Number  <span class="error">* <?php echo $phNumErr;?></span></label>
	    	<input type="text" class="form-control" name="phNum" placeholder="ex 555-555-5555">
		  </div>

  		  <div class="form-group">
	    	<label for="address">Street Address  <span class="error">* <?php echo $streetErr;?></span></label>
	    	<input type="text" class="form-control" name="address" placeholder="ex 123 Main St">
		  </div>

		  <div class="form-group">
	    	<label for="city">City  <span class="error">* <?php echo $cityErr;?></span></label>
	    	<input type="text" class="form-control" name="city" placeholder="City">
		  </div>

		  <div class="form-group">
	    	<label for="state">State  <span class="error">* <?php echo $stateErr;?></span></label>
	    	<input type="text" class="form-control" name="state" placeholder="State">
		  </div>

		  <div class="form-group">
	    	<label for="dob">Date of Birth</label>
	    	<input type="text" class="form-control" name="dob" placeholder="ex 01/30/1980">
		  </div>

		  <div class="form-group">
	    	<label for="salary">Salary</label>
	    	<input type="text" class="form-control" name="salary" placeholder="ex 36000">
		  </div>

		

		  <button type="submit" class="btn btn-success" name="submit">Add Employee</button>
		</form>
	</div>
</div>

<?php include("footer.php"); ?>
