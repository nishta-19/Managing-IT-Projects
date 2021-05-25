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

<head>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" rel="stylesheet">
</head>

<body>

  <?php include("header.inc"); ?>
  <article>
    <h2>Monthly Sales Prediction</h2>
    <p>The chart shows predicted sales for next month.</p>

    <canvas id="mychart" style="height:auto; width: 500px;"></canvas>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

    


  </article>
  <?php include("footer.inc"); ?>
</body>
