<?php
Include 'config.php';
Include 'head.php';
$ResultSet = $con->query("SELECT Username FROM user");
$ResultSet1 = $con->query("SELECT Prodname FROM product");
?>

<!DOCTYPE html>
<html lang="en">
<body>
	<?php include("header.inc"); ?>
	<div id="main">
		<article>
			<h2>Add Sales Records</h2>
			<p>Add a sale by filling out the form.</p>
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