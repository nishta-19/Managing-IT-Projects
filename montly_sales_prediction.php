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
    <h2>Monthly Sales Prediction</h2>
    <p>The chart shows predicted sales for next month.</p>


  </article>
  <?php include("footer.inc"); ?>
</body>