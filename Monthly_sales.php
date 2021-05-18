<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Monthly Sales</title>
</head>
<body>

			<h1>Dates</h1>
			<form method="post" autocomplete="off">
				<input type="Date" name="StartDate" id="StartDate" required>
				<input type="Date" name="EndDate" id="EndDate" required>
                <input type="submit" value="Select">
			</form>

            <h2>Sales</h2>       
<table border="2">
  <tr>
    <td>Sales ID</td>
    <td>Date Of Sale</td>
    <td>Product ID</td>
    <td>Ammount Sold</td>
    <td>User ID</td>
    <td>Customer</td>
  </tr>
<?php

$stmt = $con->prepare("SELECT * FROM sales Where Date BETWEEN ? AND ?");
$stmt->bind_param('ss', $_POST['StartDate'], $_POST['EndDate']);
$stmt->execute();
$result = $stmt->get_result();

while($data = $result->fetch_assoc())
{
?>
  <tr>
    <td><?php echo $data['SalesID']; ?></td>
    <td><?php echo $data['Date']; ?></td>
    <td><?php echo $data['ProductID']; ?></td>    
    <td><?php echo $data['Ammount']; ?></td>
    <td><?php echo $data['UserID']; ?></td> 
    <td><?php echo $data['Customer']; ?></td>
  </tr>	
<?php
}

$_SESSION['post-data'] = $_POST;
?>
</table>
<a href="monthly_sales_db.php"><button>Export As CSV</button></a>
</body>
</html>