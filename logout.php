<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: display_sales_records.php');
?>