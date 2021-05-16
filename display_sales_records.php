<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Peoples Health Pharmarcy</title>
	<meta name="description" content="Peoples Health Pharmarcy Website" />
	<meta name="keywords"    content="Peoples Health Pharmarcy" />
	<meta name="author"      content="Glory to the BlueBeard" />
	<link href="styles/page_style.css" rel="stylesheet" />
	<?php include("header.inc"); ?>
	<div id="main">
		<nav>
			<ul>
				<li><a href="display_sales_records.php">Display Sales Records</a></li>
				<li><a href="add_sales_records.php">Add sales records</a></li>
				<li><a href="edit_sales_records.php">Edit sales records</a></li>
				<li><a href="reports.php">Reports</a></li>
			</ul>
		</nav>
</head>
<body>
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

$resultProduct = mysqli_query($connect, "Select Prodname, Prodtype from Product");
$resultSales = mysqli_query($connect, "Select * from Sales");
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
	echo "</tr>";
}
echo "</table>";
mysqli_close($connect);
?>
</body>
</html>