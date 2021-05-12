<?php
	// We need to use sessions, so you should always start sessions using the below code.
	session_start();
	// If the user is not logged in redirect to the login page...
	if (!isset($_SESSION['loggedin'])) {
		header('Location: login.php');
		exit;
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Peoples Health Pharmarcy</title>
	<meta name="description" content="Peoples Health Pharmarcy Website" />
	<meta name="keywords"    content="Peoples Health Pharmarcy" />
	<meta name="author"      content="Glory to the BlueBeard" />
	<link href="styles/page_style.css" rel="stylesheet" />
</head>
<body>
	<?php include("header.inc"); ?>
	<div id="main">
		<nav>
			<h2>Navigation</h2>
			<ul>
				<li><a href="add_sales_records.php">Add sales records</a></li>
				<li><a href="edit_sales_records.php">Edit sales records</a></li>
				<li><a href="reports.php">Reports</a></li>
			</ul>
		</nav>
		<?php include("footer.inc"); ?>
	</div>
</body>
</html>