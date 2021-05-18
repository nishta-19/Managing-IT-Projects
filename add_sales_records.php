<?php
Include 'config.php';
$ResultSet = $con->query("SELECT Username FROM user");
$ResultSet1 = $con->query("SELECT Prodname FROM product");
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
		<article>
			<h2>Add sales records</h2>
			<form action="add_sales_db.php" method="post" autocomplete="off">
				Date: <input type="date" name="Date" id="Date"><br>
				ProductID: <select name="ProdID" id="ProdID" required>
					<?php
					while ($row = mysqli_fetch_array($ResultSet1)){
						echo "<option value='" . $row['Prodname'] . "'>" . $row['Prodname'] . "</option>";
					}
					?>
					</select><br>
				Ammount: <input type="number" name="item" id="item"><br>
				User: 				<select name="UserID" id="UserID" required>
					<?php
					while ($row = mysqli_fetch_array($ResultSet)){
						echo "<option value='" . $row['Username'] . "'>" . $row['Username'] . "</option>";
					}
					?>
					</select><br>
				Customer: <input type="text" name="Cust" id="Cust"><br>
				<input type="submit">
			</form>
		</article>
		<?php include("footer.inc"); ?>
	</div>
</body>
</html>