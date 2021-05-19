<!DOCTYPE html>


<html lang="en">
<?php include'head.php' ?>
<body>

<?php include("header.inc"); ?>
	<article>
		<h2>Sales Records</h2>
		<p>List of all sales</p>
		<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "phpsprint1";

		//Connecting to the MYSQL database
		$connect = new mysqli($servername, $username, $password, $dbname);
		if ($connect->connect_error) {
			die("Connection failed: " . $connect->connect_error);
		}

		$resultProduct = mysqli_query($connect, "Select Prodname, Prodtype from product");
		$resultSales = mysqli_query($connect, "Select * from sales");
		$resultP = mysqli_fetch_all($resultProduct, $mode=MYSQLI_ASSOC);
		echo "<table class='displaytable'>
		<tr>
		<tr>
		<th>ProductID</th>
		<th>SalesID</th>
		<th>Prodname</th>
		<th>Prodtype</th>
		<th>Amount</th>
		<th>Date</th>
		<th>Edit</th>
		</tr>";
		while($row = mysqli_fetch_array($resultSales))
		{
			echo "<tr>";
			echo "<td>" . $row['ProductID'] . "</td>";
			echo "<td>" . $row['SalesID'] . "</td>";
			echo "<td>" . $resultP[intval($row['ProductID'] - 1 )]['Prodname'] . "</td>";
			echo "<td>" . $resultP[intval($row['ProductID'] - 1 )]['Prodtype'] . "</td>";
			echo "<td>" . $row['Ammount'] . "</td>";
			echo "<td>" . $row['Date'] . "</td>";
			?><td> <a href="edit_sales_records.php?id=<?php echo $row['SalesID']?>">Edit</td><?php
			echo "</tr>";
		}
		echo "</table>";
		mysqli_close($connect);
		?>
	</article>
	<?php include("footer.inc"); ?>
</body>
</html>