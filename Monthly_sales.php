<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
    <title>Peoples Health Pharmarcy</title>
	<meta name="description" content="Peoples Health Pharmarcy Website" />
	<meta name="keywords"    content="Peoples Health Pharmarcy" />
	<meta name="author"      content="Glory to the BlueBeard" />
	<link href="styles/page_style.css" rel="stylesheet" />
</head>
<body>
<h2>Monthly sales Report</h2>
			<h3>Dates</h3>
      <p>Select a starting date and a ending date for the sales that you wish to be shown.</p>
			<form method="post" autocomplete="off">
			  Start Date:	<input type="Date" name="StartDate" id="StartDate" required>
			  End Date:	<input type="Date" name="EndDate" id="EndDate" required>
        <input type="submit" name="submit" value="Select">
			</form>

            <h4>Sales</h4>       
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
if (isset($_POST['submit'])) {
    $_SESSION['StartDate']=$_POST['StartDate'];
    $_SESSION['EndDate']=$_POST['EndDate'];
}
else{
  $_SESSION['Startdate']='';
  $_SESSION['Enddate']='';
}

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
?>
</table><br>
<a href="monthly_sales_db.php"><button>Export As CSV</button></a>
</body>
</html>