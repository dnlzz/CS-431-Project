<?php 
	$pageTitle = "Update Product";
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

	<h1>Products</h1>

<?php

if( isset($_POST['prodID']) )
{
	$prodID = $_POST['prodID'];	
	$sql = "DELETE FROM PRODUCT WHERE Product_ID = "."$prodID".";";
}

	if (mysql_query($sql)) {
		echo "DELETED";
	} else {
		echo "ERROR";
	}

?>


	<?php 

		$s = "SELECT * FROM PRODUCT"; 

		( $t = mysql_query($s) ) or die ( mysql_error() ); //Sends sql query to database
		    
		$numCols = mysql_num_fields($t);

		echo "<table class=\"table table-wrapper\">";
	
	while ( $row = mysql_fetch_assoc($t) ) :
		?>

        	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <table class="table table-wrapper">
                     
                     <tr>
						<td>
							<?php echo $row["Product_name"]; ?>
						</td>
						<td>
							<?php echo $row["Product_price"]; ?>
						</td>
						<td>
							<p><a href="#" class="btn btn-default" role="button">Edit</a></p>
						</td>
                        <td>
                        <input name = "prodID" type = "hidden" id = "prodID" value="<?php echo $row['Product_ID']; ?>">
                        </td>
                    	
                        <td>
                           <input name = "delete" type = "submit" id = "delete" class = "btn btn-danger" value = "Remove">
                        </td>
                     </tr>
                     
                  </table>
               </form>
            <?php endwhile ; ?>

	</div>
</div>

<?php include("footer.php"); ?>