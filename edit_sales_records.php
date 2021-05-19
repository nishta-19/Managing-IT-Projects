<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpsprint1";
include "display_sales_records.php";


$connect = new mysqli($servername, $username, $password, $dbname);
if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}
$SalesID = $_GET['id'];
$resultSales = mysqli_query($connect, "Select * from sales where SalesID = $SalesID");
$resultProduct = mysqli_query($connect, "Select * from product");
$row = mysqli_fetch_array($resultSales);



if(isset($_POST['update'])) 
{
    $ProductID = $_POST['ProductID'];
    $Amount = $_POST['Amount'];
	$Date = $_POST['Date'];
	
    $edit = mysqli_query($connect,"update sales set ProductID='$ProductID', Ammount='$Amount', Date='$Date' where SalesID='$SalesID'");
	
        if($edit)
    {
        mysqli_close($connect); // Close connection
        header("location:display_sales_records.php");
        exit;
    }	
}
?>

<h3>Update Data</h3>
SalesID: <?php echo $SalesID?>
<form method="POST">
  <label for="ProductID">ProductID </label>
  <input type="text" name="ProductID" value="<?php echo $row['ProductID'] ?>" placeholder="Enter ProductID" Required>
  <label for="Amount">Amount </label>
  <input type="text" name="Amount" value="<?php echo $row['Ammount'] ?>" placeholder="Enter Amount" Required>
  <label for="Date">Sale Date </label>
  <input type="text" name="Date" value="<?php echo $row['Date'] ?>" placeholder="Enter Date" Required>
  <input type="submit" name="update" value="Update">
</form>