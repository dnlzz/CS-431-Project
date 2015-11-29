<?php 
	$pageTitle = "Add Employee";
	include("header.php"); 
?>


		<div class="container-fluid" id="addEmployeeDiv">
			<div class="content">

	<?php
			// define variables and set to empty values
			$firstNameErr = $lastNameErr = $phNumErr = $streetErr = $cityErr = $stateErr = $dobErr = $salaryErr = "";
			$firstName = $lastName = $phNum = $street = $city = $state = $dob = $salary = "";

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
			    	if (!preg_match("/^[0-9 ]*$/",$phNum)) {
			    		$phNumErr = "Only numbers allowed"; 
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
			    	$nameErr = "State is required";
			   	} else {
			    	$name = test_input($_POST["state"]);
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

			}

			function test_input($data) {
			   $data = trim($data);
			   $data = stripslashes($data);
			   $data = htmlspecialchars($data);
			   return $data;
			}

		?>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <div class="form-group">
	    	<label for="firstName">First Name  <span class="error">* <?php echo $firstNameErr;?></span></label>
	    	<input type="text" class="form-control" name="firstName" placeholder="First Name" value="<?php echo $firstName;?>">
		  	
		  </div>

		  <div class="form-group">
	    	<label for="lastName">Last Name  <span class="error">* <?php echo $lastNameErr;?></span></label>
	    	<input type="text" class="form-control" name="lastName" placeholder="Last Name" value="<?php echo $lastName;?>">
		  </div>

  		  <div class="form-group">
	    	<label for="phNum">Phone Number  <span class="error">* <?php echo $phNumErr;?></span></label>
	    	<input type="text" class="form-control" name="phNum" placeholder="ex 555-555-5555" value="<?php echo $phNum;?>">
		  </div>

  		  <div class="form-group">
	    	<label for="address">Street Address  <span class="error">* <?php echo $streetErr;?></span></label>
	    	<input type="text" class="form-control" name="address" placeholder="ex 123 Main St" value="<?php echo $street;?>">
		  </div>

		  <div class="form-group">
	    	<label for="city">City  <span class="error">* <?php echo $cityErr;?></span></label>
	    	<input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $city;?>">
		  </div>

		  <div class="form-group">
	    	<label for="state">State  <span class="error">* <?php echo $stateErr;?></span></label>
	    	<input type="text" class="form-control" name="state" placeholder="State" value="<?php echo $state;?>">
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

<?php
echo "<h2>Your Input:</h2>";
echo $firstName;
echo "<br>";
echo $lastName;
echo "<br>";
echo $phNum;
echo "<br>";
echo $street;
echo "<br>";
echo $city;
echo "<br>";
echo $state;
echo "<br>";
echo $dob;
echo "<br>";
echo $salary;
?>

<?php include("footer.php"); ?>
