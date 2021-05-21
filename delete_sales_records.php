<?php
include 'config.php';

$SalesID = $_GET['id']; // get id through query string

$del = mysqli_query($con,"delete from sales where SalesID = '$SalesID'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    header("location:display_sales_records.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}