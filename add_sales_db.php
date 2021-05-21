
<?php
include 'config.php';

$SQL = 'CALL Sales(?,?,?,?,?)';


if ($stmt = $con->Prepare($SQL)) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$stmt->bind_param('sssss', $_POST['Date'], $_POST['ProdID'], $_POST['item'], $_POST['UserID'], $_POST['Cust']);
	$stmt->execute();
	$stmt->close();
	echo '<script>alert("Sales Added!");
	window.location="add_sales_records.php";
</script>';
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo '<script>alert("Could not prepare statement!");
	window.location="add_sales_records.php";
</script>';
}
$con->close();
?>