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

	if(isset($_GET['id']))
{
	$id=$_GET['id'];
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$age=$_POST['age'];
		$query3=mysql_query("update addd set name='$name', age='$age' where id='$id'");

	    $query="UPDATE PRODUCT
	            SET Product_name = '$ud_product', Product_price = '$ud_price', Department_ID = '$ud_department', Supplier_ID = '$ud_supplier' 
	            WHERE Product_ID = '$ud_ID'";
	}
	
mysql_query($query) or die(mysql_error());
if(mysql_affected_rows()>=1){
    echo "<p>($ud_ID) Record Updated<p>";
}else{
    echo "<p>($ud_ID) Not Updated<p>";
}
?>

<?php include("footer.php"); ?>