<?php
include 'config.php';
include 'head.php';
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
?>

<!DOCTYPE html>
<html>

<body>
  <?php include("header.inc"); ?>
  <article>
    <h2>Monthly sales Report</h2>
    <h3>Dates</h3>
    <p>Select a starting date and a ending date for the sales that you wish to be shown.</p>
    <form method="post" autocomplete="off">
      Start Date: <input type="Date" name="StartDate" id="StartDate" required>
      End Date: <input type="Date" name="EndDate" id="EndDate" required>
      <input type="submit" name="submit" value="Select">
    </form>


    <?php
    if (isset($_POST['submit'])) {
      $_SESSION['StartDate'] = $_POST['StartDate'];
      $_SESSION['EndDate'] = $_POST['EndDate'];

      $start = $_POST["StartDate"];
      $end = $_POST["StartDate"];

      $stmt = $con->prepare("SELECT SalesID, Date, Product.ProductID, Prodname, Prodtype, Ammount, Customer FROM sales JOIN product ON product.ProductID = Sales.ProductID Where Date BETWEEN ? AND ?");
      $stmt->bind_param('ss', $_POST['StartDate'], $_POST['EndDate']);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        //Output each row
        echo "Sales report for $start to $end";
        echo "<table>";
        echo "<tr><th>Sales ID</th><th>Date</th><th>Product ID</th><th>Product Name</th><th>Product Type</th><th>Amount</th><th>Customer</th></tr>";
        while ($row = $result->fetch_assoc()) {


          echo "<tr><td>" . $row["SalesID"] . "</td><td>" . $row["Date"] . "</td><td>" . $row["ProductID"] . "</td><td>" . $row["Prodname"] . "</td><td>" . $row["Prodtype"] . "</td><td>" . $row["Ammount"] . "</td><td>" . $row["Customer"] . "</td></tr>";
        }
        echo "</table>";
      } else {
        echo "No sales data found for $start to $end.";
      }
      if ($result->num_rows > 0) {
        echo "<a href='monthly_sales_db.php'><button>Export As CSV</button></a>";
      }
    }

    ?>


  </article>
  <?php include("footer.inc"); ?>
</body>
